<canvas id="lineChart" width="200" height="200" class="border border-green-300 rounded-2xl bg-gray-50 p-4"></canvas>

@script
<script>
    document.addEventListener('livewire:initialized', () => {
        const lineChart = {
            ctx: document.getElementById('lineChart'),

            init() {
                this.displayChart();
            },

            displayChart() {
                new Chart(this.ctx, {
                    type: 'line',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }
        lineChart.init();
    });
</script>
@endscript
