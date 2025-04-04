<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SavingsFlowTest extends TestCase
{
    use RefreshDatabase; // Reset database after each test

    #[Test]

    public function guest_users_cannot_access_dashboard_or_savings()
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->post(route('add-savings'))->assertRedirect(route('login'));
    }

    #[Test]

    public function authenticated_user_can_access_dashboard()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSee("Hello, " . $user->name);
    }

    #[Test]

    public function user_can_add_savings()
    {
        $user = User::factory()->create(['savings' => 0, 'bottles_returned' => 0]);
        
        $this->actingAs($user)
            ->post(route('add-savings'))
            ->assertRedirect(route('savings'));

        $user->refresh();
        $this->assertGreaterThan(0, $user->savings);
        $this->assertGreaterThan(0, $user->bottles_returned);
    }

    #[Test]

    public function user_savings_are_tracked_correctly_by_month()
    {
        $user = User::factory()->create([
            'savings' => 0,
            'jan_savings' => 0, 'feb_savings' => 0, 'mar_savings' => 0, 'apr_savings' => 0,
            'may_savings' => 0, 'jun_savings' => 0, 'jul_savings' => 0, 'aug_savings' => 0,
            'sept_savings' => 0, 'oct_savings' => 0, 'nov_savings' => 0, 'dec_savings' => 0,
        ]);
        
        $this->actingAs($user)
            ->post(route('add-savings'));

        $user->refresh();
        
        $currentMonth = strtolower(date('M')) . '_savings';
        $this->assertGreaterThan(0, $user->$currentMonth);
    }

    #[Test]

    public function user_can_view_savings_graph()
    {
        $user = User::factory()->create([
            'jan_savings' => 10.50, 'feb_savings' => 20.75, 'mar_savings' => 30.00,
        ]);

        $this->actingAs($user)
            ->get(route('graph'))
            ->assertStatus(200)
            ->assertSee("10.5")
            ->assertSee("20.75")
            ->assertSee("30.00");
    }
}
