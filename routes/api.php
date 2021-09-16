<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PriceController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/products', [ProductController::class, 'getAll']);
Route::get('/products/table', [ProductController::class, 'getTable']);
Route::get('/products/{id}', [ProductController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/genres', [GenreController::class, 'getAll']);
Route::get('/genres/{id}', [GenreController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/genres/{id}', [GenreController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/authors', [AuthorController::class, 'getAll']);
Route::get('/authors/{id}', [AuthorController::class, 'getOne'])->where('id', '[0-9]+');
Route::delete('/authors/{id}', [AuthorController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/product_prices', [ProductPriceController::class, 'getAll']);

Route::post('/users', [UserController::class, 'create']);
