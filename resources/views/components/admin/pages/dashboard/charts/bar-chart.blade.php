<canvas id="barChart" width="200" height="200" class="border border-green-300 rounded-2xl bg-gray-50"></canvas>

@script
<script>
    document.addEventListener('livewire:init', () => {
        const barCHart = {
            canvas: document.getElementById('barChart'),

            init() {
                this.displayChart();
            },

            displayChart() {

            }
        }
        barCHart.init();
    });
</script>
@endscript
