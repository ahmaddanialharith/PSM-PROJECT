<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Customer; // Make sure to import the Customer model
use App\Notifications\ReportInProgress;
use App\Notifications\ReportCompleted;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Method to display the admin dashboard
    public function index()
    {
        // Retrieve all reports
        $reports = Report::with(['customer', 'device'])->get();
        return view('admin', compact('reports'));
    }

    // Method to display a detailed report
    public function show($id)
    {
        // Debugging: Check if ID is being passed correctly
        \Log::debug('Show method called with ID:', ['id' => $id]);

        // Retrieve the report by ID
        $report = Report::with(['customer', 'device'])->findOrFail($id);

        // Debugging: Log the retrieved report
        \Log::debug('Retrieved report by ID.', ['report' => $report->toArray()]);

        return view('admin-view', compact('report'));
    }

    // Method to update the status of a report
    public function updateStatus(Request $request, $id)
    {
        // Validate the status input
        $request->validate([
            'status' => 'required|string|in:Pending,In Progress,Completed',
        ]);

        // Find the report and update its status
        $report = Report::findOrFail($id);
        $oldStatus = $report->status;
        $newStatus = $request->status;
        $report->status = $newStatus;
        $report->save();

        // Send notifications based on the status change
        if ($oldStatus == 'Pending' && $newStatus == 'In Progress') {
            $report->customer->notify(new ReportInProgress());
        } elseif ($oldStatus == 'In Progress' && $newStatus == 'Completed') {
            $report->customer->notify(new ReportCompleted());
        }

        return redirect()->route('admin')->with('success', 'Report status updated successfully.');
    }
}
