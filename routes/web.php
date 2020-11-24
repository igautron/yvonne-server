<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/products', [ App\Http\Controllers\ProductController::class, 'index' ]);
Route::get('/api/products/{product}', [ App\Http\Controllers\ProductController::class, 'show' ]);
Route::get('/api/filter', [ App\Http\Controllers\ProductController::class, 'filter' ]);


Route::get('/api/login', [ App\Http\Controllers\UserController::class, 'login' ]);
Route::post('/api/login', [ App\Http\Controllers\UserController::class, 'login' ]);
Route::post('/api/register', [ App\Http\Controllers\UserController::class, 'register' ]);