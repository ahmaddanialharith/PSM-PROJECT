<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutorial;
use App\Models\Step;

class TutorialSeeder extends Seeder
{
    public function run()
    {
        $tutorial = Tutorial::create([
            'title' => 'How to Fix Black Screen Issue',
            'image' => 'tutorials/black_screen.jpg'
        ]);

        Step::create([
            'tutorial_id' => $tutorial->id,
            'step_number' => 1,
            'description' => 'Hold the power button for 10 seconds.'
        ]);

        Step::create([
            'tutorial_id' => $tutorial->id,
            'step_number' => 2,
            'description' => 'Connect your phone to a charger.'
        ]);

        Step::create([
            'tutorial_id' => $tutorial->id,
            'step_number' => 3,
            'description' => 'If the issue persists, contact support.'
        ]);
    }
}
