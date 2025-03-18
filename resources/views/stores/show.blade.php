<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>
<div class="border rounded-lg shadow-md p-6  bg-[#C5EDFF] hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- Example store details display -->
<h1 class="font-bold text-5xl text-black mb-2">{{ $stores->store_name }}</h1>

<h2>Status: {{ $stores->status }}</h2>
<p>Location: {{ $stores->lat }}, {{ $stores->long }}</p>
<p>
</div>
</x-app-layout>
