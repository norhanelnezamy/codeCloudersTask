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

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'AuthController@postLogin');
Route::get('login', 'AuthController@getLogin');

Route::post('register', 'AuthController@postRegister');
Route::get('register', 'AuthController@getRegister');

Route::group(['middleware' => 'auth:web'] , function () {
  Route::resource('user', 'UserController');
});
