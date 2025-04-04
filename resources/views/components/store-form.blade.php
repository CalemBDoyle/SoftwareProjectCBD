<form method="POST" action="{{ isset($store) ? route('stores.update', $store) : route('stores.store') }}" enctype="multipart/form-data">
    @csrf
    @isset($store)
        @method('PUT')
    @endisset

    <div class="mb-4">
        <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
        <input
            type="text"
            name="store_name"
            id="store_name"
            value="{{ old('store_name', $store->store_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('store_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="Operational" {{ old('status', $store->status ?? '') == 'Operational' ? 'selected' : '' }}>Operational</option>
        <option value="Not Operational" {{ old('status', $store->status ?? '') == 'Not Operational' ? 'selected' : '' }}>Not Operational</option>
    </select>
    @error('status')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

    <div class="mb-4">
        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
        <input
            type="number"
            step="1"
            name="rating"
            id="rating"
            value="{{ old('rating', $store->rating ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="lat" class="block text-sm font-medium text-gray-700">Latitude</label>
        <input
            type="number"
            step="0.00000001"
            name="lat"
            id="lat"
            value="{{ old('lat', $store->lat ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('lat')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="long" class="block text-sm font-medium text-gray-700">Longitude</label>
        <input
            type="number"
            step="0.00000001"
            name="long"
            id="long"
            value="{{ old('long', $store->long ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('long')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($store) ? 'Update Store' : 'Add Store' }}
        </x-primary-button>
    </div>
</form>
