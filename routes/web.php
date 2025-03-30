<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/savings', function () {
    return view('savings'); 
})->name('savings');

Route::get('/graph', function () {
    return view('graph');  // Make sure 'graph.blade.php' exists in the 'resources/views' folder
});

Route::middleware('auth')->group(function () {
    Route::resource('reviews', ReviewController::class);
    Route::post('stores/{store}/reviews',[ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/stores/{store}', [StoreController::class, 'show'])->name('stores.show');
    Route::post('/add-savings', [SavingsController::class, 'addSavings'])->name('add-savings');
    
    // Route::post('/add-savings', [SavingsController::class, 'collectSavings'])->name('collect-savings');
});

require __DIR__.'/auth.php';
