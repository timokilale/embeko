<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>School Performance in CSEE (2022 - 2024)</h2>
                <div v-if="isLoading">Loading...</div>
                <div v-else-if="errorMessage" class="error">{{ errorMessage }}</div>

                <div class="chart-container" v-if="!isLoading && !errorMessage">
                    <BarChart :data="chartDataCSEE" :options="chartOptions" />
                </div>
            </div>

            <div class="col-md-6">
                <h2>School Performance in FTNA (2022 - 2024)</h2>
                <div class="chart-container" v-if="!isLoading && !errorMessage">
                    <BarChart :data="chartDataFTNA" :options="chartOptions" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <a href="/results-summary" class="btn btn-lg btn-primary">
                    <i class="fa fa-eye"></i> Results Summary
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent, defineAsyncComponent } from 'vue';
import {
    Chart as ChartJS,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend
} from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale, Tooltip, Legend);

const BarChart = defineAsyncComponent(() =>
    import('vue-chartjs').then(mod => mod.Bar)
);

export default defineComponent({
    name: 'SchoolPerformanceChart',
    components: {
        BarChart
    },
    data() {
        return {
            chartDataCSEE: { labels: [], datasets: [] },
            chartDataFTNA: { labels: [], datasets: [] },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Number of Students' }
                    },
                    x: {
                        title: { display: true, text: 'Divisions' }
                    }
                },
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: context =>
                                `${context.dataset.label}: ${context.raw} students`
                        }
                    }
                }
            },
            isLoading: true,
            errorMessage: ''
        };
    },
    methods: {
        async fetchData() {
            try {
                const years = [2022, 2023, 2024];
                const divisions = ['I', 'II', 'III', 'IV', '0'];

                const cseeResults = {};
                const ftnaResults = {};

                for (const year of years) {
                    const cseeData = await import(`../data/csee/csee_${year}.json`);
                    const ftnaData = await import(`../data/ftna/ftna_${year}.json`);

                    cseeResults[year] = this.countDivisions(cseeData.default);
                    ftnaResults[year] = this.countDivisions(ftnaData.default);
                }

                this.chartDataCSEE = {
                    labels: divisions,
                    datasets: years.map(year => ({
                        label: `CSEE ${year}`,
                        backgroundColor: this.getColor(year),
                        data: divisions.map(div => cseeResults[year][div] || 0)
                    }))
                };

                this.chartDataFTNA = {
                    labels: divisions,
                    datasets: years.map(year => ({
                        label: `FTNA ${year}`,
                        backgroundColor: this.getColor(year),
                        data: divisions.map(div => ftnaResults[year][div] || 0)
                    }))
                };
            } catch (error) {
                console.error('Detailed error loading data:', error);
                this.errorMessage =
                    'Failed to load exam data. Please check the data files or contact support.';
            } finally {
                this.isLoading = false;
            }
        },

        countDivisions(data) {
            const divisionCounts = { I: 0, II: 0, III: 0, IV: 0, 0: 0 };

            data.forEach(student => {
                const division = String(student.column4).trim();
                if (divisionCounts.hasOwnProperty(division)) {
                    divisionCounts[division]++;
                }
            });

            return divisionCounts;
        },

        getColor(year) {
            const colors = {
                2022: '#4CAF50',
                2023: '#2196F3',
                2024: '#FFC107'
            };
            return colors[year] || '#000000';
        }
    },
    mounted() {
        this.fetchData();
    }
});
</script>

<style scoped>
div {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
    font-size: 22px;
    margin-bottom: 10px;
}

.error {
    color: red;
    font-size: 18px;
    text-align: center;
}

.chart-container {
    height: 400px;
    margin-bottom: 40px;
}
</style>
