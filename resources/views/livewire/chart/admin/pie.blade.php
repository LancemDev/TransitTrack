<div>
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart"></canvas>
    </div>

    <script>
        // Pie Chart
        var ctx = document.getElementById('lineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Vehicle Type',
                    data: @json($data['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)', // Light red
                        'rgba(54, 162, 235, 0.5)', // Light blue
                        'rgba(255, 206, 86, 0.5)', // Light yellow
                        'rgba(75, 192, 192, 0.5)', // Light teal
                        'rgba(153, 102, 255, 0.5)', // Light purple
                        'rgba(255, 159, 64, 0.5)', // Light orange
                        'rgba(201, 203, 207, 0.5)'  // Light grey
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    filler: {
                        propagate: false,
                    },
                    title: {
                        display: true,
                        text: (ctx) => 'Fill: ' + ctx.chart.data.datasets[0].fill
                    }
                },
                interaction: {
                    intersect: false,
                }
            },
        });
    </script>
</div>