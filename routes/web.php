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
    Route::post('/order/accept/{order}', 'OrdersController@accept')->name('order.accept');
    Route::post('/order/decline/{order}', 'OrdersController@decline')->name('order.decline');
    Route::post('/order/completed/{order}', 'OrdersController@complete')->name('order.complete');
    Route::post('/order/finished/{order}', 'OrdersController@finished')->name('order.finish');
    Route::post('/order/fine/{order}', 'OrdersController@userDisabled')->name('order.fine');

});

Route::resource('/item', 'ItemsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
