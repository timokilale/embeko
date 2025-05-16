<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="display-6 fw-bold text-center">{{ exam.toUpperCase() + '-' + year }} </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h2 class="fw-bold">Student Grades Distribution Across Subjects</h2>
        <div v-if="isLoading">Loading...</div>
        <div v-else-if="errorMessage" class="error">{{ errorMessage }}</div>

        <div class="chart-container">
          <BarChart :data="chartDataSubjects" :options="chartOptionsSubjects" v-if="!isLoading && !errorMessage" />
        </div>
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold">Overall Grade Distribution</h2>
        <div class="chart-container">
          <BarChart :data="chartDataGrades" :options="chartOptionsGrades" v-if="!isLoading && !errorMessage" />
        </div>
      </div>
    </div>
      <div class="row justify-content-center">
          <div class="col-12 text-center">
              <a href="/results/overall-performance" class="btn btn-lg btn-primary">
                  Overall School Performance
              </a>
          </div>
      </div>
  </div>



</template>

<script>
import { defineComponent } from 'vue';
import { Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  BarElement,
  CategoryScale,
  LinearScale,
  Tooltip,
  Legend
} from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale, Tooltip, Legend);
const resultFiles = import.meta.glob('../data/**/*.json');
export default defineComponent({
  name: 'VisualizeDataPage',
  components: {
    BarChart: Bar
  },
  data() {
    return {
      // First chart: Subjects vs. Grades
      chartDataSubjects: { labels: [], datasets: [] },
      chartOptionsSubjects: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            title: { display: true, text: 'Grades' },
            ticks: {
              callback: function (value) {
                return ['A', 'B', 'C', 'D', 'F'][value] || '';
              },
            },
          },
        },
        plugins: {
          legend: { position: 'top', labels: { boxWidth: 20 } },
        },
      },

      // Second chart: Number of Students vs. Grades
      chartDataGrades: { labels: [], datasets: [] },
      chartOptionsGrades: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            title: { display: true, text: 'Number of Students' },
          },
          x: {
            title: { display: true, text: 'Grades' },
          },
        },
        plugins: {
          legend: { display: false },
        },
      },

      results: [],
      subjects: ['CIV', 'HIST', 'GEO', 'B/KNOWL', 'KISW', 'ENGL', 'PHY', 'CHEM', 'BIO', 'B/MATH'],
      gradeToScore: { A: 5, B: 4, C: 3, D: 2, F: 0 }, // Removed Grade E
      isLoading: true,
      errorMessage: '',
    };
  },
    props:{
      exam: '',
        year:''
    },
  methods: {
    async fetchResults() {
      try {
        const examFile = `../data/${this.exam}/${this.exam}_${this.year}.json`;
        const data =await resultFiles[examFile]();

        if (!data || !data.default || !Array.isArray(data.default) || data.default.length === 0) {
          this.errorMessage = 'No student data found for this exam.';
          return;
        }

        this.results = data.default;
        this.computeChartDataSubjects();
        this.computeChartDataGrades();
      } catch (error) {
        console.error('Error loading data:', error);
        this.errorMessage = 'Error loading student data.';
      } finally {
        this.isLoading = false;
      }
    },

    // Chart 1: Subjects vs. Grades
    computeChartDataSubjects() {
      const gradeCounts = this.subjects.reduce((acc, subject) => {
        acc[subject] = { A: 0, B: 0, C: 0, D: 0, F: 0 }; // Removed Grade E
        return acc;
      }, {});

      this.results.forEach((student) => {
        if (student.column5 === 'ABS') return; // Skip absent students

        this.subjects.forEach((subject) => {
          const regex = new RegExp(`${subject}[' -]+'([A-D,F])'`, ''); // Updated regex to exclude E
          const match = student.column5.match(regex);
          if (match) {
            gradeCounts[subject][match[1]] += 1;
          }
        });
      });

      this.chartDataSubjects.labels = this.subjects;
      this.chartDataSubjects.datasets = Object.keys(this.gradeToScore).map((grade) => ({
        label: grade,
        backgroundColor: this.getColor(grade),
        data: this.subjects.map((subject) => gradeCounts[subject][grade]),
      }));
    },

    // Chart 2: Number of Students vs. Grades
    computeChartDataGrades() {
      const gradeCounts = { A: 0, B: 0, C: 0, D: 0, F: 0 }; // Removed Grade E

      this.results.forEach((student) => {
        if (student.column5 === 'ABS') return; // Skip absent students

        this.subjects.forEach((subject) => {
          const regex = new RegExp(`${subject}[' -]+'([A-D,F])'`, ''); // Updated regex to exclude E
          const match = student.column5.match(regex);
          if (match) {
            gradeCounts[match[1]] += 1;
          }
        });
      });

      this.chartDataGrades.labels = Object.keys(gradeCounts); // ['A', 'B', 'C', 'D', 'F']
      this.chartDataGrades.datasets = [
        {
          label: 'Number of Students',
          backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#000000', '#F44336'],
          data: Object.values(gradeCounts),
        },
      ];
    },

    getColor(grade) {
      const colors = { A: '#4CAF50', B: '#2196F3', C: '#FFC107', D: '#000000', F: '#F44336' }; // Removed Grade E color
      return colors[grade] || '#000000';
    },
  },
  mounted() {
    this.fetchResults();
  },
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
  font-size: 24px;
  font-weight: bold;
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
