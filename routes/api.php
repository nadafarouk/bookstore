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

Route::prefix('users')->group( function (){

    Route::post('', 'User\UserController@createUser');
    Route::get('activate/{activationToken}','User\UserController@activateUser');
    /*
     * Password Reset routes
     * **/
    Route::post('password','User\UserController@requestPasswordReset');
    Route::get('password/{passwordResetToken}','User\UserController@verifyPasswordResetToken');
    Route::post('password/{passwordResetToken}','User\UserController@resetPassword');

});
/*
* Book CRUD routes
*/

Route::prefix('books')->group( function () {

    Route::middleware(['permission:read','auth:api'])->group(function () {
        Route::get('','Item\BookController@index');
        Route::get('{bookId}','Item\BookController@show');
    });

    Route::middleware(['permission:write','auth:api'])->group(function () {
        Route::post('','Item\BookController@create');
    });

    Route::middleware(['permission:delete','auth:api'])->group(function () {
        Route::delete('{bookId}','Item\BookController@delete');
    });

    Route::middleware(['permission:update','auth:api'])->group(function () {
        Route::post('{bookId}','Item\BookController@update');
    });

});

