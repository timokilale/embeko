<template>
  <div class="container mt-5">
    <h1 class="text-center">{{ exam.toUpperCase() }} {{ year }} Examination Results</h1>

    <section class="my-4">
      <h2>Select Examination Type and Year</h2>
      <form @submit.prevent="fetchResults" class="form-row align-items-center">
        <div class="col-auto">
          <label for="examType" class="sr-only">Examination Type</label>
          <select id="examType" v-model="exam" class="form-control mb-2" required @change="resetFields">
            <option value="">Select Examination Type</option>
            <option value="csee">CSEE</option>
            <option value="ftna">FTNA</option>
          </select>
        </div>
        <div class="col-auto">
          <label for="year" class="sr-only">Year</label>
          <select id="year" v-model="year" class="form-control mb-2" required @change="resetFields">
            <option value="">Select Year</option>
            <option v-for="y in years" :key="y" :value="y">{{ y }}</option>
          </select>
        </div>
        <div class="col- justify-content-between align-baseline">
          <button type="submit" class="btn btn-primary mb-2 mx-3" :disabled="loading">
            <i class="fas fa-spinner fa-spin" v-if="loading"></i>
            <span v-else>Fetch Results</span>
          </button>
          <a v-if="results.length" :href="`/results/visualize/${exam}/${year}`" class="btn btn-success">
            Visualize Data
          </a>
        </div>
      </form>
    </section>

    <p v-if="displayError" class="text-danger">No results found for the selected exam and year.</p>

    <section class="my-4" v-if="!loading && results.length">
      <h2>Division Performance Summary</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Sex</th>
            <th>Division I</th>
            <th>Division II</th>
            <th>Division III</th>
            <th>Division IV</th>
            <th>Division 0</th>
            <th>ABS</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Female</td>
            <td>{{ divisionPerformance.female[0] }}</td>
            <td>{{ divisionPerformance.female[1] }}</td>
            <td>{{ divisionPerformance.female[2] }}</td>
            <td>{{ divisionPerformance.female[3] }}</td>
            <td>{{ divisionPerformance.female[4] }}</td>
            <td>{{ divisionPerformance.female[5] }}</td>
          </tr>
          <tr>
            <td>Male</td>
            <td>{{ divisionPerformance.male[0] }}</td>
            <td>{{ divisionPerformance.male[1] }}</td>
            <td>{{ divisionPerformance.male[2] }}</td>
            <td>{{ divisionPerformance.male[3] }}</td>
            <td>{{ divisionPerformance.male[4] }}</td>
            <td>{{ divisionPerformance.male[5] }}</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>{{ divisionPerformance.total[0] }}</td>
            <td>{{ divisionPerformance.total[1] }}</td>
            <td>{{ divisionPerformance.total[2] }}</td>
            <td>{{ divisionPerformance.total[3] }}</td>
            <td>{{ divisionPerformance.total[4] }}</td>
            <td>{{ divisionPerformance.total[5] }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <section class="my-4" v-if="!loading && results.length">
      <h2>Detailed Student Results</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>CNO</th>
            <th>SEX</th>
            <th>AGGT</th>
            <th>DIV</th>
            <th>DETAILED SUBJECTS</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="result in results" :key="result.column1">
            <td>{{ result.column1 }}</td>
            <td>{{ result.column2 === 'M' ? 'Male' : 'Female' }}</td>
            <td>{{ result.column3 === 'ABS' ? 'N/A' : result.column3 }}</td>
            <td>{{ result.column4 === 'ABS' ? 'N/A' : result.column4 }}</td>
            <td>{{ result.column5 === 'ABS' ? 'Absent' : result.column5 }}</td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>
</template>

<script>

const resultFiles = import.meta.glob('../data/**/*.json');
export default {
  data() {
    return {
      displayError: false,
      results: [],
      loading: false,
      exam: "",
      year: "",
      years: [2022, 2023, 2024],
      divisionPerformance: {
        female: [0, 0, 0, 0, 0, 0],
        male: [0, 0, 0, 0, 0, 0],
        total: [0, 0, 0, 0, 0, 0]
      }
    };
  },
  methods: {
    resetFields() {
      this.results = [];
    },
      async fetchResults() {
          this.results = [];
          if (!this.exam || !this.year) return;
          this.loading = true;
          this.displayError = false;

          const filePath = `../data/${this.exam}/${this.exam}_${this.year}.json`;

          if (resultFiles[filePath]) {
              try {
                  const module = await resultFiles[filePath]();
                  this.results = module.default;
                  this.calculateDivisionPerformance();
              } catch (error) {
                  console.error("Error loading results:", error);
                  this.displayError = true;
              }
          } else {
              console.error("File not found:", filePath);
              this.displayError = true;
          }

          this.loading = false;
      },
      calculateDivisionPerformance() {
      const romanToNumber = { "I": 1, "II": 2, "III": 3, "IV": 4, "0": 0 };
      this.divisionPerformance = {
        female: [0, 0, 0, 0, 0, 0],
        male: [0, 0, 0, 0, 0, 0],
        total: [0, 0, 0, 0, 0, 0]
      };
      this.results.forEach(result => {
        const sex = result.column2.trim().toLowerCase();
        if (result.column5 === "ABS") {
          this.divisionPerformance[sex === 'f' ? 'female' : 'male'][5]++;
          this.divisionPerformance.total[5]++;
          return;
        }
        let division = romanToNumber[result.column4] || 0;
        const index = division === 0 ? 4 : division - 1;
        this.divisionPerformance[sex === 'f' ? 'female' : 'male'][index]++;
        this.divisionPerformance.total[index]++;
      });
    }
  }
};
</script>
