<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>
<div class="border rounded-lg shadow-md p-6  bg-[#C5EDFF] hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- Example store details display -->
<h1 class="font-bold text-5xl text-black mb-2">{{ $store->store_name }}</h1>

<h2>Status: {{ $store->status }}</h2>
<p>Location: {{ $store->lat }}, {{ $store->long }}</p>


    <h4 class="font-semibold text-md mt-8">Reviews</h4> 
    @if($store->reviews->isEmpty())
        <p class="text-gray-600">No reviews yet.</p>
    @else
        <ul class="mt-4 space-y-4">
            @foreach($store->reviews as $review)
                <li class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-semibold">{{ $review->user->name }} {{ $review->created_at->format('M d, Y') }}</p> 
                    <p>Rating: {{ $review->rating }} / 5</p>
                    <p>{{ $review->comment }}</p>
                </li>
            @endforeach
        </ul>
    @endif
    <h4 class="font-semibold text-md mt-8">Add a Review</h4>
    <form action="{{ route('reviews.store', $store) }}" method="POST" class="mt-4"> 
        @csrf
        <div class="mb-4">
            <label for="rating" class="block font-medium text-sm text-gray-700">Rating</label>
            <select name="rating" id="rating" class="mt-1 block w-full" required>
                <option value="1">1</option> 
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
                <option value="5">5</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="comment" class="block font-medium text-sm text-gray-700">Comment</label>
            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full" placeholder="write your review here..."></textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 ■text-white font-bold py-2 px-4 rounded">
            Submit Review
        </button>
    </form>
</div>
</x-app-layout>
