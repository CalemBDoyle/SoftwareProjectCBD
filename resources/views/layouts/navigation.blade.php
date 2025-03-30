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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l9 4v12l-9 4-9-4V6l9-4z" />
                    </svg>
                </a>

                <a href="/graph" class="flex flex-col items-center space-y-1">
                <svg class="h-10 w-10 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l9 4v12l-9 4-9-4V6l9-4z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>
