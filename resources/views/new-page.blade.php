<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Button to add €0.15 to savings -->
    <form method="POST" action="{{ route('add-savings') }}">
        @csrf
        <button type="submit" class="inline-block py-2 px-4 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Add €0.15 to Savings
        </button>
    </form>
</x-app-layout>