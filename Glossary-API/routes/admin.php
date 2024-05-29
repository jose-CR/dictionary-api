<?php

use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('table-word', [HomeController::class, 'word'])->name('table-word');
Route::get('table-category', [HomeController::class, 'category'])->name('table-category');
Route::get('table-subcategory', [HomeController::class, 'subcategory'])->name('table-subcategory');