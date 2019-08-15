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

Route::post('users', 'User\UserController@createUser');
Route::get('users/verify/{token}','User\UserController@verifyUser');

/*
 * Password Reset routes
 * **/

Route::post('users/password','User\UserController@requestPasswordReset');
Route::get('users/password/{token}','User\UserController@verifyPasswordResetToken');
Route::post('users/password/{token}','User\UserController@resetPassword');

/*
 * Book CRUD routes
 */

Route::get('books','Item\BookController@index');
Route::get('books/{id}','Item\BookController@show');
Route::post('books','Item\BookController@store');
Route::delete('books/{id}','Item\BookController@delete');
Route::post('books/{id}','Item\BookController@update');
