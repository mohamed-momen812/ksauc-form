<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\MandatoryFormController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard-user', function () {
        return view('dashboard-user.index');
    })->name('dashboard.user');

    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-user', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-user', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mandatory-form', [MandatoryFormController::class, 'create'])->name('mandatory.form');
    
    Route::get('/api/groups/{sector}', [MandatoryFormController::class, 'getGroups']);
    Route::get('/api/categories/{group}', [MandatoryFormController::class, 'getCategories']);
    Route::get('/api/products/{category}', [MandatoryFormController::class, 'getProductsByCategory']);

    Route::post('mandatory-form', [MandatoryFormController::class, 'store'])->name('mandatory.store');

    Route::get('/orders-user', [OrderController::class, 'userOrder'])->name('orders');
        
});


Route::middleware(['auth', 'admin'])->group(function () { 
    Route::get('/dashboard-admin', function () {
        return view('dashboard-admin.index');
    })->name('dashboard.admin');

    Route::get('/profile-admin', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-admin', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-admin', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
    Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');
    
    Route::get('/orders-admin', [OrderController::class, 'adminOrder'])->name('orders');

});
