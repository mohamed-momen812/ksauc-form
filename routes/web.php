<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MandatoryFormController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/groups/{sector}', [IndexController::class, 'showSectorGroups'])->name('showSectorGroups');
Route::get('/categories/{group}', [IndexController::class, 'showGroupCategories'])->name('showGroupCategories');
Route::get('/products/{category}', [IndexController::class, 'showCategoryProducts'])->name('showCategoryProducts');

Route::get('/showProduct/{product}', [IndexController::class, 'showProduct'])->name('showProduct');

  

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard-user', [OrderController::class, 'showUserstatistics'])->name('dashboard.user');

    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/profile-user', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::delete('/profile-user', [ProfileController::class, 'destroy'])->name('user.profile.destroy');

    Route::get('/mandatory-form', [MandatoryFormController::class, 'create'])->name('mandatory.form');

    Route::get('/api/groups/{sector}', [MandatoryFormController::class, 'getGroups']);
    Route::get('/api/categories/{group}', [MandatoryFormController::class, 'getCategories']);
    Route::get('/api/products/{category}', [MandatoryFormController::class, 'getProductsByCategory']);

    Route::post('mandatory-form', [MandatoryFormController::class, 'store'])->name('mandatory.store');

    Route::get('/orders-user', [OrderController::class, 'userOrder'])->name('orders.user');

}); 


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard-admin', function () {
        return view('dashboard-admin.index');
    })->name('dashboard.admin');

    Route::get('/profile-admin', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile-admin', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile-admin', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::get('/import', [ExcelImportController::class, 'create'])->name('import.create');
    Route::post('/import', [ExcelImportController::class, 'import'])->name('import.store');

    Route::get('/orders-admin', [OrderController::class, 'adminOrder'])->name('orders.admin');
    Route::post('/orders/{order}/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
    Route::post('/orders/{order}/refuse', [OrderController::class, 'refuse'])->name('orders.refuse');

    Route::get('/statistics', [OrderController::class, 'showStatistics'])->name('statistics.admin');

});
