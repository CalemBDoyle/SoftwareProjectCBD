<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Graph') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen">  <!-- Centering the content vertically and horizontally -->
        <div class="w-full max-w-4xl mx-auto">
            <!-- Canvas for the chart -->
            <canvas id="bottleChart" class="w-full h-96 sm:h-[30rem] md:h-[35rem] lg:h-[40rem] xl:h-[45rem]"></canvas>  <!-- Adjusted height -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data for bottle collection per month
        const data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],  // Months
            datasets: [{
                label: 'Bottles Collected',
                data: @json([Auth::user()->jan_savings, 8, 12, 6, 14, 10, 9, 7, 15, 11, 18, 20]),  // Number of bottles collected per month
                backgroundColor: 'rgba(54, 162, 235, 0.2)',  // Fill color
                borderColor: 'rgba(54, 162, 235, 1)',  // Border color
                borderWidth: 1
            }]
        };

        // Configuration for the chart
        const config = {
            type: 'bar',  // Chart type - bar chart
            data: data,
            options: {
                responsive: true,  // Make the chart responsive
                maintainAspectRatio: false,  // Allow the chart to resize based on container's size
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,  // Start the y-axis at 0
                        title: {
                            display: true,
                            text: 'Bottles Collected'
                        }
                    }
                }
            }
        };

        // Create the chart
        const bottleChart = new Chart(
            document.getElementById('bottleChart'),  // The canvas element where the chart will be drawn
            config
        );
    </script>
</x-app-layout>

