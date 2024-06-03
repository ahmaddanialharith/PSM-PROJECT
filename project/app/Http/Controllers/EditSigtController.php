<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Step;

class EditSigtController extends Controller
{
    // Method to display the edit sigt form in admin page
    public function showInterface()
    {
        $tutorials = Tutorial::with('steps')->get();
        return view('EditSigt' , compact('tutorials'));
    }

    // Store or update a tutorial
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
            'steps' => 'required|array',
            'steps.*' => 'required|string',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tutorials', 'public');
        }

        // Update or create the tutorial
        $tutorial = Tutorial::updateOrCreate(
            ['id' => $request->tutorial_id],
            [
                'title' => $request->title,
                'image' => $imagePath,
            ]
        );

        // Delete existing steps and add new ones
        $tutorial->steps()->delete();
        foreach ($request->steps as $index => $description) {
            Step::create([
                'tutorial_id' => $tutorial->id,
                'step_number' => $index + 1,
                'description' => $description,
            ]);
        }

        return redirect()->route('admin.tutorials.index');
    }

    // Delete a tutorial
    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();
        return redirect()->route('admin.tutorials.index');
    }


}
