<?php

namespace Tests\Feature;

use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase; // Resets DB after each test

    public function guests_cannot_create_a_store()
    {
        $response = $this->post(route('stores.store'), [
            'store_name' => 'Test Store',
            'status' => 'Operational',
            'rating' => 4.5,
            'lat' => 37.7749,
            'long' => -122.4194,
        ]);

        $response->assertRedirect(route('login')); // Ensure guests are redirected
        $this->assertDatabaseMissing('stores', ['store_name' => 'Test Store']); // Store should NOT exist
    }

   
    public function authenticated_users_can_create_a_store()
    {
        $user = User::factory()->create();

        $this->actingAs($user); // Simulate logged-in user

        $response = $this->post(route('stores.store'), [
            'store_name' => 'Test Store',
            'status' => 'Operational',
            'rating' => 4.5,
            'lat' => 37.7749,
            'long' => -122.4194,
        ]);

        $response->assertRedirect(route('stores.index')); // Ensure successful redirect
        $this->assertDatabaseHas('stores', ['store_name' => 'Test Store']); // Store should exist
    }

  
    public function store_creation_requires_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('stores.store'), []); // Send empty data
        $response->assertSessionHasErrors(['store_name', 'status', 'rating', 'lat', 'long']); // Ensure validation fails
    }
}