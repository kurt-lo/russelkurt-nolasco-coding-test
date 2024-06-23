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

// API ROUTES FOR PRODUCTS E-COMMERCE

/**  Route for fetching all the products
 **   Api Endpoint: {{your-domain}}/api/products mine is http://127.0.0.1:8000/api/products
 **   HTTP Method: GET
 **/
Route::get('products', [ProductsController::class, 'index']);

/**  Route for fetching all the products but returning just the name of the products
 **   HTTP Method: GET
 **   Api Endpoint: {{your-domain}}/api/products/name
 **/
Route::get('products/name', [ProductsController::class, 'indexName']);

/**  Route for fetching specific product
 *   HTTP Method: GET
 **   Api Endpoint: {{your-domain}}/api/products/{id}
 **/
Route::get('products/{id}', [ProductsController::class, 'show']);

/**  Route for create a product
 **   HTTP Method: POST
 **   Api Endpoint: {{your-domain}}/api/products
 **/
Route::post('products', [ProductsController::class, 'store']);

/**  Route for updating a product
 **   HTTP Method: PUT
 **   Api Endpoint: {{your-domain}}/api/products/update/{id}
 **/
Route::put('products/update/{id}', [ProductsController::class, 'update']);

/**  Route for deleting a product
 **   Api Endpoint: {{your-domain}}/api/products/delete/{id}
 **   HTTP Method: DELETE
 **/
Route::delete('products/delete/{id}', [ProductsController::class, 'destroy']);
