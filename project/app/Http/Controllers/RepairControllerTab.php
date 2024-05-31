<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repairform;

class RepairControllerTab extends Controller
{
    // Method to display the repair form
    public function showInterface()
    {
        return view('repair-device-form');
    }

    // Method to store the form data
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'smartphone_model' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'issue_description' => 'required|string',
        ]);

        // Create a new Repairform entry
        Repairform::create($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
