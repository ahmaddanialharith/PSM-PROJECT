<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class SigtController extends Controller
{
    // Method to display the sigt
    // public function showInterface()
    // {
    //     return view('sigt');
    // }

     // Display the list of tutorials to users
     public function index()
     {
         $tutorials = Tutorial::with('steps')->get();
         return view('sigt', compact('tutorials'));
     }
 
     // Display a single tutorial to users
     public function show(Tutorial $tutorial)
     {
         return view('tutorials.show', compact('tutorial'));
     }
}
