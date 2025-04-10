<nav x-data="{ open: false }" class="bg-white border-t border-gray-100 fixed bottom-0 left-0 w-full">
    <!-- Primary Navigation Menu -->
    <div class="bg-[#81D4FA] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
          
            
            <!-- Navigation Links (Icons centered on larger screens) -->
            <div class="flex space-x-8 justify-evenly w-full">
                <!-- Dashboard Link with SVG Icon -->
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center space-y-1">
                    <svg class="h-10 w-10 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </a>

                <!-- Show Map Link with SVG Icon -->
                <a href="{{ route('stores.index') }}" class="flex flex-col items-center space-y-1">
                <svg class="h-10 w-10 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l5-2 4 2 4-2 5 2v12l-5-2-4 2-4-2-5 2V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l2 1 2-1 2 1 2-1" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13l2 1 2-1 2 1 2-1" />
                </svg>

                </a>

                <a href="/graph" class="flex flex-col items-center space-y-1">
                <svg class="h-10 w-10 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20h16M4 4v16" />
                    <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 3 4-5 4 2" />
                </svg>

                </a>
            </div>
        </div>
    </div>
</nav>
