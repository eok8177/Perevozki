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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function() {

    Route::get('/services',  ['uses' => 'PageController@services']);
    Route::get('/cars',  ['uses' => 'PageController@cars']);
    Route::get('/page/{slug}',  ['uses' => 'PageController@page']);

    Route::post('/call',  ['uses' => 'MessageController@call']);

    Route::get('/tips',  ['uses' => 'PostController@index']);
    Route::get('/tip/{slug}',  ['uses' => 'PostController@post']);

    Route::get('/reviews',  ['uses' => 'ReviewController@index']);
    Route::get('/reviewsTop',  ['uses' => 'ReviewController@top']);
    Route::post('/review',  ['uses' => 'ReviewController@addReview']);

});