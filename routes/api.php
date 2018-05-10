<?php

use Illuminate\Http\Request;


Route::group(['prefix'=>'v1'],function(){


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::apiResource('/products','ProductController');

Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{product}/reviews','ReviewsController');
});




Route::apiResource('/categories','CategoryController');

Route::group(['prefix'=>'category'],function(){
	Route::apiResource('/{category}/CategoryProduct','CategoryProductController');
});

});