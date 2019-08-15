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


Route::group(['middleware' => 'auth:api'], function () {
    /*
     * Book CRUD routes
     */
    Route::get('books','Item\BookController@index')->middleware('permission:read');
    Route::get('books/{id}','Item\BookController@show')->middleware('permission:read');
    Route::post('books','Item\BookController@store')->middleware('permission:write');
    Route::delete('books/{id}','Item\BookController@delete')->middleware('permission:delete');
    Route::post('books/{id}','Item\BookController@update')->middleware('permission:update');

});

