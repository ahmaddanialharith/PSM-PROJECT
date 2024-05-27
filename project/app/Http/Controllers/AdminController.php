<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to display the admin dashboard
    public function ShowInterface()
    {
        return view('admin');
    }
}
