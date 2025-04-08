<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


// Route::get('/dashboard', function () {
//     return view('dashboard/index');
// })->middleware(['auth', 'verified'])->name('dashboard');

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

require __DIR__.'/auth.php';
