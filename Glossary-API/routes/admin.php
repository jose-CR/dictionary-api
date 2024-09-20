<?php

use App\Http\Controllers\admin\AdminCategory;
use App\Http\Controllers\admin\AdminSubCategory;
use App\Http\Controllers\admin\AdminWord;
use illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('table-category', [AdminCategory::class, 'category'])->name('table-category');
Route::get('table-subcategory', [AdminSubCategory::class, 'subcategory'])->name('table-subcategory');
Route::get('table-word', [AdminWord::class, 'word'])->name('table-word');

Route::group([], function(){
    //routes about Category
    Route::get('/api/v1/update-category/{id}', [AdminCategory::class, 'updatecategory'])->name('update-category');
    Route::get('/api/v1/create-category', [AdminCategory::class, 'createcategory'])->name('create-category');

    //routes about subcategory
    Route::get('/api/v1/update-subcategory/{id}', [AdminSubCategory::class, 'updatesubcategory'])->name('update-subcategory');
    Route::get('/api/v1/create-subcategory', [AdminSubCategory::class, 'createsubcategory'])->name('create-subcategory');

    //routes about word
    Route::get('/api/v1/update-word/{id}', [AdminWord::class, 'updateword'])->name('update-word');
    Route::get('/api/v1/create-word/', [AdminWord::class, 'createword'])->name('create-word');

});
