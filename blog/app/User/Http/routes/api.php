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
Route::post('token', 'TokenController@token');
Route::group(['middleware' => ['token']], function () {
    Route::get('user-one/{id}', 'UserController@findUserOne');
    Route::post('user-one', 'UserController@addUserOne');

});
Route::get('user-list', 'UserController@userList');
Route::post('user-redis', 'UserController@userRedis');
