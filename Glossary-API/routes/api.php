<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\subCategoryController;
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

//Version 2 
Route::group(['middleware' => 'api.cors', 'prefix' => 'v2', ], function(){
    Route::get('', [HomeController::class, 'principal'])->name('principal');
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('subcategories', subCategoryController::class);
    Route::apiResource('words', WordController::class);
});

Route::group(['prefix' => 'v2'], function(){    
    Route::post('words/bulk', [WordController::class, 'bulkStore']);
});
