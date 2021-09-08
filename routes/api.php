<?php

use App\Http\Controllers\GenresController;
use App\Http\Controllers\ProductsController;
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

Route::get('/products', [ProductsController::class, 'getAll']);
Route::get('/products/{id}', [ProductsController::class, 'getOne'])->where('id', '[0-9]+');
Route::get('/genres', [GenresController::class, 'getAll']);
Route::get('/genres/{id}', [GenresController::class, 'getOne'])->where('id', '[0-9]+');

