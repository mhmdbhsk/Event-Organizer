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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>''], function(){
    Route::get('/', function(){
        return view('welcome');
    });
});


Route::group(['prefix'=>'', 'middleware'=>['auth', 'role:member']], function(){
    Route::resource('user', 'UserIndexController');
    Route::post('user/{id}/daftar', 'UserIndexController@daftar');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function(){
    route::get('/', function(){
        return view('admin.dashboard');
    });
    Route::resource('events', 'EventController');
    Route::resource('users', 'UserController');
    Route::resource('participants', 'ParticipantController');
});

