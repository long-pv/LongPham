<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
});

Route::prefix('products')->name('products.')->group(function(){
    Route::get('/', ['ProductController@index'])->name('index');

    Route::get('/{id}/show', ['ProductController@show'])
    ->name('show');

});

Route::prefix('categories')->name('categories.')->group(function(){
    Route::get('/', ['uses' => 'CategoryController@index'])->name('index');

    Route::get('/{id}/show', ['uses' => 'CategoryController@show'])
    ->name('show');

});
