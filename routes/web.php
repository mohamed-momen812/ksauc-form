<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\MandatoryFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

require __DIR__.'/auth.php';

// User Routs
Route::middleware(['auth', 'user'])->group(function () {
    // User Dashboard
    Route::get('/dashboard-user', function () {
        return view('dashboard-user.index');
    })->name('dashboard.user');

    // Profile Routs
    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-user', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-user', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Form
    Route::get('/mandatory-form', [MandatoryFormController::class, 'create'])->name('mandatory.form');
    
    // get data
    Route::get('/api/groups/{sector}', [MandatoryFormController::class, 'getGroups']);
    Route::get('/api/categories/{group}', [MandatoryFormController::class, 'getCategories']);
    Route::get('/api/products/{category}', [MandatoryFormController::class, 'getProducts']);

    // store form
    Route::post('/form/store', [MandatoryFormController::class, 'store'])->name('mandatory.store');

    // get user order
    Route::get('/orders', function () {
        return view('dashboard-user.orders');
    })->name('orders');
        
});


// Admin Routs
Route::middleware(['auth', 'admin'])->group(function () { 
    // Admin Dashboard  
    Route::get('/dashboard-admin', function () {
        return view('dashboard-admin.index');
    })->name('dashboard.admin');

    // Profile Routs
    Route::get('/profile-admin', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-admin', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-admin', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Import Data
    Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
    Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');
    
    // table
    Route::get('/tables', function () {
        return view('dashboard-admin.tables');
    })->name('tables');

});


// Route::get('/form', function () {
//     return view('form');
// })->name('form');
