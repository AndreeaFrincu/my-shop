<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\UserController;
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

/** Products */
Route::get('/products', [ProductController::class, 'getAll']);
Route::get('/products/table', [ProductController::class, 'getTable']);
Route::get('/products/{id}', [ProductController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->where('id', '[0-9]+');

/** Genres */
Route::get('/genres', [GenreController::class, 'getAll']);
Route::get('/genres/{id}', [GenreController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/genres/{id}', [GenreController::class, 'delete'])->where('id', '[0-9]+');

/** Authors */
Route::get('/authors', [AuthorController::class, 'getAll']);
Route::get('/authors/{id}', [AuthorController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/authors/{id}', [AuthorController::class, 'delete'])->where('id', '[0-9]+');

/** Product Prices */
Route::get('/product_prices', [ProductPriceController::class, 'getAll']);

/** Users */
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/users', [UserController::class, 'getAll']);
Route::get('/user', [UserController::class, 'getCurrent'])->middleware('auth:sanctum');

/** Carts */
Route::get('/carts', [CartController::class, 'getAll']);
Route::get('/carts/{id}', [CartController::class, 'getOne'])->where('id', '[0-9]+');

/** Cart Products */
Route::get('/cart_products', [CartProductsController::class, 'getAll']);
Route::get('/cart_products/{id}', [CartProductsController::class, 'getOne'])->where('id', '[0-9]+');
