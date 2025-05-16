<template>
  <div class="container-fluid">
    <h1 class="text-center mt-4">Student Examination Results</h1>
    <ResultsSummary :results="sortedResults" />
  </div>
</template>

<script>
import ResultsSummary from "../components/ResultsSummary.vue";

// ✅ Manually import JSON data
import csee2022 from "../data/csee/CSEE_2022.json";
import csee2023 from "../data/csee/CSEE_2023.json";
import csee2024 from "../data/csee/CSEE_2024.json";
import ftna2022 from "../data/ftna/FTNA_2022.json";
import ftna2023 from "../data/ftna/FTNA_2023.json";
import ftna2024 from "../data/ftna/FTNA_2024.json";

export default {
  components: {
    ResultsSummary,
  },
  data() {
    return {
      groupedResults: {
        CSEE: {
          2022: this.filterAndSortResults(csee2022),
          2023: this.filterAndSortResults(csee2023),
          2024: this.filterAndSortResults(csee2024),
        },
        FTNA: {
          2022: this.filterAndSortResults(ftna2022),
          2023: this.filterAndSortResults(ftna2023),
          2024: this.filterAndSortResults(ftna2024),
        },
      },
    };
  },
  computed: {
    // ✅ Sort years in descending order
    sortedResults() {
      return {
        CSEE: this.sortYears(this.groupedResults.CSEE),
        FTNA: this.sortYears(this.groupedResults.FTNA),
      };
    },
  },
  methods: {
    // ✅ Filter out ABS and sort by division (I → IV)
    filterAndSortResults(results) {
      const order = { I: 1, II: 2, III: 3, IV: 4 };

      return results
        .filter(student => student.column5 !== "ABS") // ✅ Remove ABS entries
        .sort((a, b) => (order[a.column4] || 5) - (order[b.column4] || 5));
    },
    // ✅ Sort years in descending order (latest first)
    sortYears(resultsByYear) {
      return Object.keys(resultsByYear)
        .sort((a, b) => b - a) // Convert keys to numbers & sort in descending order
        .reduce((sorted, year) => {
          sorted[year] = resultsByYear[year];
          return sorted;
        }, {});
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 900px;
  margin: auto;
}
</style>
