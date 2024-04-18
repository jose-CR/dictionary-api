<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SanctumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('table-word', [HomeController::class, 'word'])->name('table-word');
Route::get('table-category', [HomeController::class, 'category'])->name('table-category');
Route::get('table-subcategory', [HomeController::class, 'subcategory'])->name('table-subcategory');
Route::get('token',[SanctumController::class, 'AuthSanctum']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
