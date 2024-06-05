<?php

use App\Http\Controllers\RepairControllerTab;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SigtController;
use App\Http\Controllers\EditSigtController;
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

    //for sigt controller route
    Route::get('/Sigt', [SigtController::class, 'index'])->name('sigt');
    Route::get('/tutorials/{tutorial}', [SigtController::class, 'show'])->name('tutorials.show');
    //Sigt Route
    //Route::get('/Sigt', [SigtController::class, 'showInterface'])->name('sigt');
    

    Route::get('/EditSigt', [EditSigtController::class, 'showInterface'])->name('EditSigt');

}); 

// Admin routes for managing tutorials
Route::middleware('auth')->group(function () {
    Route::get('/admin/tutorials', [EditSigtController::class, 'showInterface'])->name('admin.tutorials.index');
    Route::post('/admin/tutorials', [EditSigtController::class, 'storeOrUpdate'])->name('admin.tutorials.storeOrUpdate');
    Route::delete('/admin/tutorials/{tutorial}', [EditSigtController::class, 'destroy'])->name('admin.tutorials.destroy');
});


require __DIR__.'/auth.php';

Route::get('/admin', [AdminController::class, 'ShowInterface'])->middleware(['auth', 'verified' , 'admin'])->name('admin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'showRepairForms'])->name('admin');