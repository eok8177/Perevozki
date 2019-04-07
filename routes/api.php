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

    Route::get('/pages',  ['uses' => 'PageController@index']);
    Route::get('/page/{slug}',  ['uses' => 'PageController@page']);

    Route::post('/call',  ['uses' => 'MessageController@call']);


    Route::get('/tips',  ['uses' => 'TestController@tips']);
    Route::get('/tip/{id}',  ['uses' => 'TestController@tip']);

    Route::get('/menuPages',  ['uses' => 'TestController@menuPages']);


    Route::get('/buses',  ['uses' => 'TestController@buses']);


});