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

    /*
     * Book CRUD routes
     */
Route::get('books','Item\BookController@index');
Route::get('books/{id}','Item\BookController@show');
Route::post('books','Item\BookController@store');
Route::delete('books/{id}','Item\BookController@delete');
Route::post('books/{id}','Item\BookController@update');
