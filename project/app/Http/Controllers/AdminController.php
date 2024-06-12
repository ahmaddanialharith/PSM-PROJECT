<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Repairform;

class AdminController extends Controller
{
     // Method to display the admin dashboard
     public function ShowInterface()
     {
        return view('admin');
     }

    // Method to retrieve repair forms data and display it
    public function showRepairForms()
    {
        // Retrieve all records from the repairforms table
        $repairForms = RepairForm::all();

        // Pass the data to the view
        return view('admin', compact('repairForms'));
    }
}
