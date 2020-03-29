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
Auth::routes();

Route::get('/', [ProductCategoryController::class, 'index'])->name('index');

Route::resource('category', '\App\Http\Controllers\ProductCategoryController');

Route::resource('card', '\App\Http\Controllers\ProductCardController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', '\App\Http\Controllers\Admin\ProductCardController@index')->name('admin');
Route::get('/admin/new', '\App\Http\Controllers\Admin\ProductCardController@getNewCards')->name('admin.productCard.new');
Route::get('/admin/complaint', '\App\Http\Controllers\Admin\ProductCardController@getComplaintCards')->name('admin.productCard.complaint');
Route::get('/admin/cardsCount', '\App\Http\Controllers\Admin\ProductCardController@getCardsCount')->name('admin.cardsCount');

Route::get('/admin/{card}/edit', '\App\Http\Controllers\Admin\ProductCardController@edit')->name('admin.productCard.edit');
Route::put('/admin/{card}/update', '\App\Http\Controllers\Admin\ProductCardController@update')->name('admin.productCard.update');

