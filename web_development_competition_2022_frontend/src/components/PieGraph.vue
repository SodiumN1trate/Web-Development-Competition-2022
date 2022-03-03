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
              data: [1000, 500, 1500]
            }]
        },
        options: {
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    mounted () {
      this.renderChart(this.chartData, this.options)
    }
  }
</script>