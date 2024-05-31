<?php

use App\Http\Controllers\RepairControllerTab;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/repair', [RepairControllerTab::class, 'showInterface'])->name('repair-device-form');
    Route::post('/submit-repair-form', [RepairControllerTab::class, 'store'])->name('repair-form.store');

});     

require __DIR__.'/auth.php';

Route::get('/admin', [AdminController::class, 'ShowInterface'])->middleware(['auth', 'verified' , 'admin'])->name('admin');
