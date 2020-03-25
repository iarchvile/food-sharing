<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductCategoryController;

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

Route::get('/', [ProductCategoryController::class, 'index'])->name('index');

Route::resource('category', '\App\Http\Controllers\ProductCategoryController');

Route::resource('card', '\App\Http\Controllers\ProductCardController');