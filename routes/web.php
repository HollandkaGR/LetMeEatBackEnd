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
	Route::patch('/restaurant/update', 'Admin\RestaurantController@update')->name('admin.restaurant.update');
	Route::delete('/restaurant/delete/{restId}', 'Admin\RestaurantController@delete')->name('admin.restaurant.delete');
	
	Route::get('/restaurant/cities', 'Admin\RestaurantController@possibleCities')->name('admin.restaurant.cities');

	Route::get('/restaurant/categories/{catId}', 'Admin\CategoryController@index')->name('admin.restaurant.categories.index');
	Route::post('/restaurant/categories/new', 'Admin\CategoryController@create')->name('admin.restaurant.categories.create');
	Route::patch('/restaurant/categories/update', 'Admin\CategoryController@update')->name('admin.restaurant.categories.update');
	Route::delete('/restaurant/categories/delete/{catId}', 'Admin\CategoryController@delete')->name('admin.restaurant.categories.delete');
	
	Route::post('/restaurant/product/new', 'Admin\ProductController@create')->name('admin.restaurant.categories.create');
	Route::patch('/restaurant/product/update', 'Admin\ProductController@update')->name('admin.restaurant.categories.update');
	Route::delete('/restaurant/product/delete/{prodId}', 'Admin\ProductController@delete')->name('admin.restaurant.categories.delete');
	
	Route::post('/restaurant/test', 'RestaurantController@test')->name('restaurant.test');
});

Route::post('/register', 'Auth\AuthController@register')->name('registration');
