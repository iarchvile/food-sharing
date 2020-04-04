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

Route::resource('category', 'ProductCategoryController');
Route::resource('card', 'ProductCardController');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('isAdministrator')->group(function () {
    Route::get('/', 'Admin\ProductCardController@index')->name('admin');
    Route::get('new', 'Admin\ProductCardController@getNewCards')->name('admin.productCard.new');
    Route::get('complaint', 'Admin\ProductCardController@getComplaintCards')->name('admin.productCard.complaint');
    Route::get('cardsCount', 'Admin\ProductCardController@getCardsCount')->name('admin.cardsCount');
    Route::get('{card}/edit', 'Admin\ProductCardController@edit')->name('admin.productCard.edit');
    Route::put('{card}/update', 'Admin\ProductCardController@update')->name('admin.productCard.update');
});

Route::prefix('user')->middleware('isAdministrator')->group(function () {
    Route::get('/', 'Admin\UserController@index')->name('admin.user');
    Route::get('{user}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::put('{user}/update', 'Admin\UserController@update')->name('admin.user.update');
});

Route::resource('my', 'User\UserController')->middleware('auth');

Route::get('settings/edit', 'User\UserSettingsController@edit')->name('user.settings.edit');
Route::put('settings/update', 'User\UserSettingsController@update')->name('user.settings.update');
