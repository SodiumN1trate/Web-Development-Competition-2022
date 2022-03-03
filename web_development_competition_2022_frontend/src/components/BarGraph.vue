<script>
    import { Bar } from 'vue-chartjs'
    
    export default {
        name: "BarGraphComponent",
        extends: Bar,
        mounted: function() {
            // Overwriting base render method with actual data.
            this.renderChart({
            labels: ['F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D', 'J'],
            datasets: [
                {
                label: "Done",
                backgroundColor: '#a8a8a8',
                data: [20, 10, 12, 29, 10, 20, 29, 15, 20, 20, 5, 20]
                }
            ]
            })
        }
    }
</script>

<style scope>

canvas {
    height: 200px;
}

</style>