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

Route::group(['prefix'=>'', 'middleware'=>['auth', 'role:member']], function(){
    Route::resource('client', 'UserIndexController');
    Route::post('client/{id}/daftar', 'UserIndexController@daftar');
});

Route::group(['prefix'=>'admin'], function(){
    Route::resource('events', 'ApiEventController');
    Route::resource('users', 'ApiUserController');
    Route::resource('participants', 'ApiParticipantController');
});
