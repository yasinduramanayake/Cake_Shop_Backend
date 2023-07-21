<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('addproduct', [ProductController::class, 'store']);
Route::post('addcart', [CartController::class, 'store']);
Route::get('products', [ProductController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('cartdetails', [CartController::class, 'index']);
Route::put('updateproduct/{id}', [ProductController::class, 'update']);
Route::delete('delete/{id}', [ProductController::class, 'destroy']);
Route::get('deletecart', [CartController::class, 'deleteAll']);
