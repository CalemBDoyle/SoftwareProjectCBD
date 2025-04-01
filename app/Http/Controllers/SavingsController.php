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

        // Initialize total amount and the message collection
        $totalAmount = 0;
        $totalBottles = 0;
        $messages = [];  // Initialize an array to store messages

        for ($i = 0; $i < 10; $i++) {
            // Generate a random amount (either 0.15 or 0.25)
            $randomAmount = (rand(0, 1) == 0) ? 0.15 : 0.25;
            $totalAmount += $randomAmount;
            $totalBottles += 1;


            // Format the total amount to 2 decimal places
            $formattedTotalAmount = number_format($totalAmount, 2);

            // Add a message to the array
            $messages[] = "Bottle added! Total amount so far: €" . $formattedTotalAmount;
        }

        $currentMonth = date('n');  // Get current month as a number (1 to 12)

// Array of month names (optional for reference)
$months = [
    1 => 'jan_savings',
    2 => 'feb_savings',
    3 => 'mar_savings',
    4 => 'apr_savings',
    5 => 'may_savings',
    6 => 'jun_savings',
    7 => 'jul_savings',
    8 => 'aug_savings',
    9 => 'sept_savings',
    10 => 'oct_savings',
    11 => 'nov_savings',
    12 => 'dec_savings',
];

// Get the current month's savings field name
$monthlySavings = $months[$currentMonth];

// Add the formatted amount to the current month's savings
$user->$monthlySavings += $formattedTotalAmount;

$user->savings += $formattedTotalAmount;

// Save the changes to the database
$user->save();

        // Increment the bottles returned
        $user->bottles_returned += $totalBottles;

        // Save the updated savings value to the database
        $user->save();

        // Determine the final message to show the user
        $finalMessage = '€' . $formattedTotalAmount . ' added to your savings with ' . $totalBottles . '!';

        // Store messages and final message in session
        session()->flash('messages', $messages);
        // session()->flash('status', $finalMessage);

        // Redirect to the same page
        return redirect()->route('savings');
    }

    public function collectSavings(){

    }
}