<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\MandatoryFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');

Route::get('/mandatory-form', [MandatoryFormController::class, 'create'])->name('mandatory.form');

Route::get('/api/groups/{sector}', [MandatoryFormController::class, 'getGroups']);
Route::get('/api/categories/{group}', [MandatoryFormController::class, 'getCategories']);
Route::get('/api/products/{category}', [MandatoryFormController::class, 'getProducts']);

Route::post('/form/store', [MandatoryFormController::class, 'store'])->name('mandatory.store');

Route::get('/', function () {
    return view('index');
})->name('home');

require __DIR__.'/auth.php';

Route::get('/form', function () {
    return view('form');
})->name('form');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard/index');
    })->name('dashboard');

    Route::get('/tables', function () {
        return view('dashboard/tables');
    })->name('tables');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

