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

Route::apiResource('words', WordController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('subcategories', SubCategoryController::class);

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function() {
    Route::post('words/bulk', [WordController::class, 'bulkStore']);
});
