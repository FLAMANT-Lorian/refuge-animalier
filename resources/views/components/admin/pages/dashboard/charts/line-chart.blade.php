<canvas id="lineChart" width="200" height="200" class="border border-green-300 rounded-2xl bg-gray-50"></canvas>

@script
<script>
    document.addEventListener('livewire:init', () => {
        const lineChart = {
            canvas: document.getElementById('lineChart'),

            init() {
                this.displayChart();
            },

            displayChart() {

            }
        }

        lineChart.init();
    });
</script>
@endscript
