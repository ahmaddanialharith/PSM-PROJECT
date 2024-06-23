<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class DashboardController extends Controller
{
    // Method to display the dashboard welcome message
    public function welcome()
    {
        // Any logic for the welcome message can go here if needed
        return view('dashboard');
    }

    // Method to display the reports with progress bars
    public function reports()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve reports for the authenticated customer
        $reports = Report::with(['customer', 'device'])
                         ->where('customer_id', $user->id)
                         ->get();

        // Return the view with the reports
        return view('dashboard', compact('reports'));
    }
}