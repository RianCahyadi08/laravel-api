<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::get('/get-product', [ProductController::class, 'getAllProduct']);
Route::get('/get-product/{id}', [ProductController::class, 'getProductId']);
Route::put('/update-product/{id}', [ProductController::class, 'updateProductId']);
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProductId']);
Route::get('/search-product', [ProductController::class, 'searchProduct']);