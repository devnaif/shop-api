<?php

use Illuminate\Http\Request;


Route::group(['prefix'=>'v1'],function(){


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('login', 'AuthController@login');

Route::apiResource('/products','ProductController', ['middleware' => 'auth.token']);

Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{product}/reviews','ReviewsController');
});




Route::apiResource('/categories','CategoryController');

Route::group(['prefix'=>'category'],function(){
	Route::apiResource('/{category}/CategoryProduct','CategoryProductController');
});

});