<canvas id="doughnutChart" width="200" height="200" class="border border-green-300 rounded-2xl bg-gray-50"></canvas>

@script
<script>
    document.addEventListener('livewire:init', () => {
        const doughnutChart = {
            canvas: document.getElementById('doughnutChart'),

            init() {
                this.displayChart();
            },

            displayChart() {

            }
        }
        doughnutChart.init();
    });
</script>
@endscript
