<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: POST, PUT, PATCH, DELETE, GET, OPTIONS'); 


Route::post('/login', 'Auth\AuthController@login');
Route::post('/create/restaurant', 'RestaurantController@create');
Route::get('/ettermek', 'RestaurantController@index');
Route::get('/products/{slug}', 'RestaurantController@products');

// protect
Route::group(['middleware' => 'jwt.auth'], function() {
	Route::get('/me', 'Auth\AuthController@user');
	Route::get('/timeline', 'TimelineController@index');
});
Route::post('/logout', 'Auth\AuthController@logout');

