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
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'UserController@details');
    Route::get('/logout', 'UserController@logout');
    Route::post('/player/store', 'PlayerController@store');
    Route::put('/player/update/{player}', 'PlayerController@update');
    Route::get('/team/{team}', 'TeamController@show');
    Route::post('/team/store', 'TeamController@store');



});

