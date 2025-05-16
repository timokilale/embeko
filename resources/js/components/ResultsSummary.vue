<template>
    <div class="container mt-4">
      <div v-if="groupedResults.CSEE">
        <h3 class="mt-4">CSEE Results</h3>
        <div v-for="(results, year) in groupedResults.CSEE" :key="'CSEE-' + year">
          <h4 class="mt-3">{{ year }}</h4>
          <div class="row">
            <div class="col-md-3" v-for="(count, division) in getSummary(results)" :key="'CSEE-' + year + division">
              <div class="card text-white mb-3" :class="getCardClass(division)">
                <div class="card-header">Division {{ division }}</div>
                <div class="card-body">
                  <h5 class="card-title">{{ count }} Students</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div v-if="groupedResults.FTNA">
        <h3 class="mt-4">FTNA Results</h3>
        <div v-for="(results, year) in groupedResults.FTNA" :key="'FTNA-' + year">
          <h4 class="mt-3">{{ year }}</h4>
          <div class="row">
            <div class="col-md-3" v-for="(count, division) in getSummary(results)" :key="'FTNA-' + year + division">
              <div class="card text-white mb-3" :class="getCardClass(division)">
                <div class="card-header">Division {{ division }}</div>
                <div class="card-body">
                  <h5 class="card-title">{{ count }} Students</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </template>
  
  <script>
  export default {
    props: {
      results: {
        type: Object, // Expected to be an object with CSEE and FTNA data grouped by year
        required: true,
      },
    },
    computed: {
      groupedResults() {
        return this.results; // Data already grouped by year and type
      },
    },
    methods: {
      getSummary(results) {
        return results.reduce((acc, student) => {
          const division = student.column4;
          acc[division] = (acc[division] || 0) + 1;
          return acc;
        }, {});
      },
      getCardClass(division) {
        const colors = {
          I: "bg-success",
          II: "bg-primary",
          III: "bg-warning",
          IV: "bg-dark",
        };
        return colors[division] || "bg-secondary";
      },
    },
  };
  </script>
  
  <style scoped>
  .card {
    text-align: center;
  }
  </style>
  