<?php

use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\MandatoryFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');

Route::get('/mandatory-form', [MandatoryFormController::class, 'create'])->name('mandatory.form');

Route::get('/api/groups/{sector}', [MandatoryFormController::class, 'getGroups']);
Route::get('/api/categories/{group}', [MandatoryFormController::class, 'getCategories']);
Route::get('/api/products/{category}', [MandatoryFormController::class, 'getProducts']);

Route::post('/form/store', [MandatoryFormController::class, 'store'])->name('mandatory.store');