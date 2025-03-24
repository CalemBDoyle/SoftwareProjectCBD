<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsController extends Controller
{
    public function addSavings()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Generate a random value (either 0.15 or 0.25)
        $randomAmount = (rand(0, 1) == 0) ? 0.15 : 0.25;

        // Add €0.15 to the user's current savings
        $user->savings += $randomAmount;

        $user->bottles_returned += 1;

        // Save the updated savings value to the database
        $user->save();

        // Optionally, you can return a response or redirect back
        return redirect()->route('dashboard')->with('status', '€0.15 added to your savings!');
    }
}
