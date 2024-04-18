<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function() {
    
Route::apiResource('categories', CategoryController::class);
Route::apiResource('words', WordController::class);
Route::apiResource('subcategories', SubCategoryController::class);

});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api', 'middleware' => 'auth:sanctum'], function() {
    Route::post('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::delete('/subcategory/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::put('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('words/create', [WordController::class, 'create'])->name('word.create');
    Route::post('words/bulk', [WordController::class, 'bulkStore']);
    Route::delete('/words/{word}', [WordController::class, 'destroy'])->name('word.destroy');
    Route::put('/word/edit/{id}', [WordController::class, 'edit'])->name('word.edit');
});
