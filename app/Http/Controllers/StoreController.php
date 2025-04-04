<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $stores = Store::all(); // Fetch all stores from the database
        return view('stores.index', compact('stores')); // Pass stores to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'store_name' => 'required|max:255',
        'status' => 'required|in:Operational,Not Operational',
        'rating' => 'required|numeric|min:0|max:5',
        'lat' => 'required|numeric',
        'long' => 'required|numeric',
    ]);



    // Create a store record in the database
    Store::create([
        'store_name' => $request->store_name,
        'status' => $request->status,
        'rating' => $request->rating,
        'lat' => $request->lat,
        'long' => $request->long,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect to the index page with a success message
    return to_route('stores.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
{
    $store->load('reviews.user');
    return view('stores.show', compact('store'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
