<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Device;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    // Method to display the repair form
    public function showInterface()
    {
        return view('repair-device-form');
    }

    // Method to store the repair form data
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . Auth::id(),
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'device_brand' => 'nullable|string|max:255',
            'device_model' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'pictures' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Create or update the customer
        $customer = Customer::updateOrCreate(
            ['id' => $user->id],
            [
                'full_name' => $validatedData['full_name'],
                'contact_number' => $validatedData['contact_number'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'area' => 'labis',
                'state' => 'Johor',
                'postal_code' => $validatedData['postal_code'],
            ]
        );

        // Create a new device
        $device = Device::create([
            'brand' => $validatedData['device_brand'],
            'model' => $validatedData['device_model'],
            'color' => $validatedData['color'],
        ]);

        // Handle the image upload if present
        if ($request->hasFile('pictures')) {
            $imagePath = $request->file('pictures')->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        // Create a new report
        $report = Report::create([
            'customer_id' => $customer->id, // Use the authenticated user's ID Auth::id(),
            'device_id' => $device->id,
            'problem_description' => $validatedData['problem_description'],
            'previous_repairs' => $request->previous_repairs,
            'pictures' => $imagePath,
            'service_type' => $request->service_type,
            'urgency_level' => $request->urgency_level,
            'under_warranty' => $request->under_warranty,
            'warranty_provider' => $request->warranty_provider,
            'data_backup_required' => $request->data_backup_required,
            'data_wipe_consent' => $request->data_wipe_consent,
            'sensitive_data' => $request->sensitive_data,
            'status' => 'Pending',
        ]);

        // Redirect to the dashboard with a success message
        return redirect()->route('repair-device-form')->with('success', 'Report submitted successfully.');
    }
}
