<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepairControllerTab extends Controller
{

     // Method to display the repair form
     public function showInterface()
     {
         return view('repair-device-form');
     }
    
}
