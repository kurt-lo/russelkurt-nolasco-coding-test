<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Api routes for Products
Route::get('products', [ProductsController::class, 'index']);
Route::get('products/name', [ProductsController::class, 'indexName']);
Route::get('products/{id}', [ProductsController::class, 'show']);
Route::post('products', [ProductsController::class, 'store']);
Route::put('products/update/{id}', [ProductsController::class, 'update']);
Route::delete('products/delete/{id}', [ProductsController::class, 'destroy']);

// Api routes for Products using resource
// Route::resource('products', ProductsController::class);
