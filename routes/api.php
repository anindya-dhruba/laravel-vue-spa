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
    Route::get('message', 'MessagesController@fetchMessages');
    Route::get('room_message', ['as' => 'search', 'uses' => 'MessagesController@fetchRoomMessages']);
    // Route::get('room_message', 'MessagesController@fetchRoomMessages');
    Route::post('message', 'MessagesController@sendMessage');
    Route::get('room', 'RoomsController@fetchRooms');
    Route::post('room', 'RoomsController@createRoom');
});
