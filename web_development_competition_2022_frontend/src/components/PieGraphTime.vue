<script>
  import { Pie } from 'vue-chartjs'
  export default {
    extends: Pie,
    data () {
      return {
        chartData1: {
          labels: ["Design", "Front-End", "Back-End"],
          datasets: [{
              backgroundColor: [
              '#adadad',
              '#9c9c9c',
              '#7d7d7d',
              ],
              data: [this.$store.state.categoriesTime.design, this.$store.state.categoriesTime.front_end, this.$store.state.categoriesTime.back_end]
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
      this.renderChart(this.chartData1, this.options)
      this.$store.dispatch('filter_tasks_by_category_time').then(() => {
        console.log(this.$store.state.categoriesTime)
      })
    }
  }
</script>
