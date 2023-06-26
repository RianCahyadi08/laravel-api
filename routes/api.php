<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'jwt.verify'], function () {
    
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::post('/create-product', [ProductController::class, 'createProduct']);
    Route::get('/get-product', [ProductController::class, 'getAllProduct']);
    Route::get('/get-product/{id}', [ProductController::class, 'getProductId']);
    Route::put('/update-product/{id}', [ProductController::class, 'updateProductId']);
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProductId']);
    Route::get('/search-product', [ProductController::class, 'searchProduct']);

    Route::post('/create-brand', [BrandController::class, 'createBrand']);
    Route::get('/get-brand', [BrandController::class, 'getAllBrand']);
    Route::get('/get-brand/{id}', [BrandController::class, 'getBrandId']);
    Route::put('/update-brand/{id}', [BrandController::class, 'updateBrandId']);
    Route::delete('/delete-brand/{id}', [BrandController::class, 'deleteBrandId']);
    Route::get('/search-brand', [BrandController::class, 'searchBrand']);
});