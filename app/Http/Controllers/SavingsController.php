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

        // Add €0.15 to the user's current savings (last random amount)
        $user->savings += $formattedTotalAmount;

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