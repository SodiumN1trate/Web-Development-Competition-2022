<script>
  import { Pie } from 'vue-chartjs'
  export default {
    extends: Pie,
    data () {
      return {
        chartData: {
          labels: ["Design", "Front-End", "Back-End"],
          datasets: [{
              backgroundColor: [
              '#adadad',
              '#9c9c9c',
              '#7d7d7d',
              ],
              data: [this.$store.state.categoriesCount.design, this.$store.state.categoriesCount.front_end, this.$store.state.categoriesCount.back_end]
            }]
        },
        options: {
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: true
        }
      }
    },
    mounted () {
      this.renderChart(this.chartData, this.options)
      this.$store.dispatch('filter_tasks_by_category').then(() => {
      })
    }
  }
</script>
