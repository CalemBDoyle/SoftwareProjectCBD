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
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Savings',
            data: {!! json_encode([
                Auth::user()->jan_savings, 
                Auth::user()->feb_savings, 
                Auth::user()->mar_savings, 
                Auth::user()->apr_savings, 
                Auth::user()->may_savings, 
                Auth::user()->jun_savings, 
                Auth::user()->jul_savings, 
                Auth::user()->aug_savings, 
                Auth::user()->sept_savings, 
                Auth::user()->oct_savings, 
                Auth::user()->nov_savings, 
                Auth::user()->dec_savings
            ]) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
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
                scales: {
                    y: {
                        beginAtZero: true,  // Start the y-axis at 0
                        title: {
                            display: true,
                            text: 'Savings'
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

