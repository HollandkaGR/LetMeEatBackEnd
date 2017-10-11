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

Route::group(['middleware' => ['jwt.auth']], function () {
	Route::post('/user/update', 'Auth\AuthController@userUpdate')->name('user.update');
});

Route::group(['middleware' => ['isAdmin']], function () {
	Route::get('/restaurant/owned', 'Admin\RestaurantController@index')->name('admin.restaurant.index');
	Route::post('/restaurant/new', 'Admin\RestaurantController@create')->name('admin.restaurant.new');
	Route::get('/restaurant/cities', 'Admin\RestaurantController@possibleCities')->name('admin.restaurant.cities');
	Route::post('/restaurant/test', 'RestaurantController@test')->name('restaurant.test');
});

Route::post('/register', 'Auth\AuthController@register')->name('registration');
