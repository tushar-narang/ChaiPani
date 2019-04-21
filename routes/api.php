<?php

use Illuminate\Http\Request;

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

Route::post('register', 'API\AuthenticationController@register');
Route::post('login', 'API\AuthenticationController@login');
Route::get('users', 'API\AuthenticationController@index');
Route::resource('items', 'API\ItemsController');
Route::get('categories', 'API\CategoriesController@index');
Route::get('categories/{id}', 'API\CategoriesController@getItems');
Route::get('items/{item}', 'API\ItemsController@show');
Route::post('orders', 'API\OrdersController@create');
Route::get('orders/{id}', 'API\OrdersController@show');
Route::get('orders/items/{id}', 'API\OrdersController@orderItems');
Route::get('orders/user/{user}', 'API\OrdersController@getUserOrders');
Route::get('logs', 'API\AuthenticationController@getLogs');
Route::post('changePassword', 'API\AuthenticationController@changePassword');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
