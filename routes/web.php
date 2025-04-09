<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\MandatoryRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function () {
        Route::get('/mandatory-form', [MandatoryRequestController::class, 'create'])->name('mandatory.form');
        
        Route::get('/api/groups/{sector}', [MandatoryRequestController::class, 'getGroups']);
        Route::get('/api/categories/{group}', [MandatoryRequestController::class, 'getCategories']);
        Route::get('/api/products/{category}', [MandatoryRequestController::class, 'getProductsByCategory']);

        Route::post('/mandatory-form', [MandatoryRequestController::class, 'store'])->name('mandatory.store');
});

Route::middleware(['auth', 'admin'])->group(function () {      
        Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
        Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');
        
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');

        Route::get('/tables', function () {
            return view('dashboard.tables');
        })->name('tables');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// Route::get('/form', function () {
//     return view('form');
// })->name('form');
