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

Route::get('hello', function() {
    return response()->json(['message' => 'Hello world']);
});

Route::middleware( [ 'cors' ] )->prefix( 'users' )->as( 'users.' )->group( function() {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{user}', 'UserController@show')->name('show');
} );

Route::middleware( [ 'cors' ] )->prefix( 'stories' )->as( 'stories.' )->group( function() {
    Route::get('/', 'StoryController@index')->name('index');
    Route::get('/{story}', 'StoryController@show')->name('show');
} );

Route::middleware( [ 'cors' ] )->prefix( 'comments' )->as( 'comments.' )->group( function() {
    Route::get('/', 'CommentController@index')->name('index');
    Route::get('/{comment}', 'CommentController@show')->name('show');
} );
