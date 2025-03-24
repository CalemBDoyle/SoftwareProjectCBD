<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
        <div class="max-w-7xl mx-auto sm:px-6 ">
                <div class=" text-gray-900">
                    <h1 class="text-2xl font-semibold">
                    {{ __("Hello, " . Auth::user()->name) }}
                    </h1>

                    <div class="min-h-screen flex items-center justify-center py-12">
                    <div class="text-center">
                        <!-- Text Above the Button -->
                        <p class="text-lg mb-6">
                            {{ __("You have saved " . Auth::user()->savings . " with " . Auth::user()->bottles_returned .  " bottles") }}
                        </p>

                        <!-- Container for Buttons -->
                            <div class="flex justify-center space-x-4">
                            <!-- Primary Button 1 -->
                                <a href="/new-page" class="inline-block py-6 px-16 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 text-lg">
                                    Button 1
                                </a>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
        
    </div>
</x-app-layout>
