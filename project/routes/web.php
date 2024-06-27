<?php

use App\Http\Controllers\RepairController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SigtController;
use App\Http\Controllers\EditSigtController;
use App\Http\Controllers\DashboardController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $dashboardController = new DashboardController();
        
        // Get the welcome message view
        $welcomeView = $dashboardController->welcome()->render();
        
        // Get the reports data and view
        $reportsView = $dashboardController->reports();
        $reports = $reportsView->getData()['reports'];

        // Return the combined view
        return view('dashboard', compact('welcomeView', 'reports'));
    })->name('dashboard');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/chatify', [MessagesController::class, 'index'])->name('chatify');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('repairs/form', [RepairController::class, 'showInterface'])->name('repair-device-form');
    Route::post('/repair-device-store', [RepairController::class, 'store'])->name('repair-device.store');

    //for sigt controller route
    Route::get('/Sigt', [SigtController::class, 'index'])->name('sigt');
    Route::get('/tutorials/{tutorial}', [SigtController::class, 'show'])->name('tutorials.show');
    //Sigt Route
    //Route::get('/Sigt', [SigtController::class, 'showInterface'])->name('sigt');
    

    Route::get('/EditSigt', [EditSigtController::class, 'showInterface'])->name('EditSigt');

    //invoice route
    Route::get('/admin/completed-reports', [InvoiceController::class, 'showCompletedReports'])->name('geninvoice');
    Route::post('/admin/generate-receipt', [InvoiceController::class, 'generateReceipt'])->name('invoice');
    Route::post('/admin/save-invoice/{id}', [InvoiceController::class, 'saveInvoice'])->name('saveInvoice');
    Route::get('/admin/view-invoice/{id}', [InvoiceController::class, 'viewReceipt'])->name('view-invoice');




}); 

// Admin routes for managing tutorials
Route::middleware('auth')->group(function () {
    Route::get('/admin/tutorials', [EditSigtController::class, 'showInterface'])->name('admin.tutorials.index');
    Route::post('/admin/tutorials', [EditSigtController::class, 'storeOrUpdate'])->name('admin.tutorials.storeOrUpdate');
    Route::delete('/admin/tutorials/{tutorial}', [EditSigtController::class, 'destroy'])->name('admin.tutorials.destroy');

    //Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified' , 'admin'])->name('admin');
    // Route::get('/admin/view/{id}', [AdminController::class, 'show'])->name('admin-view');
    // Route::patch('/admin/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');

});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/view/{id}', [AdminController::class, 'show'])->name('admin-view');
    Route::patch('/admin/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});


require __DIR__.'/auth.php';


