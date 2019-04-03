<?php

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

Route::post('authenticate', 'AuthenticateController@authenticate');

Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::get('user', 'UserController@show');
    Route::post('user/profile/update', 'UserController@updateProfile');
    Route::post('user/password/update', 'UserController@updatePassword');

    Route::get('rooms', 'RoomController@index');
    Route::get('rooms/{id}', 'RoomController@show');
    Route::post('rooms', 'RoomController@store');
    Route::put('rooms/{id}', 'RoomController@update');
    Route::delete('rooms/{id}', 'RoomController@destroy');
    Route::get('rooms/{id}/messages', 'RoomController@messages');

    Route::get('messages', 'MessageController@index');
    Route::get('messages/{id}', 'MessageController@show');
    Route::post('messages', 'MessageController@store');
    Route::put('messages/{id}', 'MessageController@update');
    Route::delete('messages/{id}', 'MessageController@destroy');

});
