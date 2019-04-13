<?php

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



Route::middleware('auth')->group(function (){
    Route::resource('/category', 'CategoriesController');
    Route::resource('/user', 'UsersController');
    Route::resource('/order', 'OrdersController');
    Route::resource('/order/items','OrderItemsController');
    Route::post('/order/accept/{id}', 'OrdersController@accept')->name('order.accept');
    Route::post('/order/decline/{id}', 'OrdersController@decline')->name('order.decline');
});

Route::resource('/item', 'ItemsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
