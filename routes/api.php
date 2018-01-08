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

Route::get( '/test',
    function() {
        return response()->json( [ 'user' => [ 'name'         => 'Ismail',
                                               'username'     => 'Ismail85',
                                               'karma_points' => 200,
                                               'about'        => 'Aliquam libero autem voluptates id qui. Doloribus autem amet aut unde. Quaerat occaecati aliquam aut amet iusto quia iste. Omnis et sunt voluptatibus officia.' ] ] );
    } );

Route::middleware( 'auth:api' )->get( '/user',
    function( Request $request ) {
        return $request->user();
    } );

Route::get( 'hello',
    function() {
        return response()->json( [ 'message' => 'Hello world' ] );
    } );


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::prefix( 'users' )->as( 'users.' )->group( function() {
    Route::get( '/', 'UserController@index' )->name( 'index' );
    Route::get( '/by-id/{user}', 'UserController@show' )->name( 'show' );
    Route::get( '/by-username/{username}', 'UserController@showByUsername' )->name( 'show.byusername' );
    Route::post( '/register', 'UserController@register' )->name( 'register' );
    Route::post( '/update', 'UserController@update' )->name( 'update' );
} );

Route::post( 'users/update', 'UserController@update' )->name( 'users.update' )->middleware( 'auth:api' );
Route::post( 'users/updatepass', 'UserController@updatePassword' )->name( 'users.updatepass' )->middleware( 'auth:api' );

Route::prefix( 'stories' )->as( 'stories.' )->group( function() {
    Route::get( '/', 'StoryController@index' )->name( 'index' );
    Route::get( '/{story}', 'StoryController@show' )->name( 'show' );
    Route::get( '/{story}/comments', 'StoryController@comments' )->name( 'show.comments' );
} );
Route::post( 'stories/store', 'StoryController@store' )->name( 'story.store' )->middleware( 'auth:api' );

Route::prefix( 'comments' )->as( 'comments.' )->group( function() {
    Route::get( '/', 'CommentController@index' )->name( 'index' );
    Route::get( '/{comment}', 'CommentController@show' )->name( 'show' );
} );

Route::prefix( 'post' )->as( 'post.' )->group( function() {
    Route::post( '/', 'PostController@store' )->name( 'store' );
} );

Route::get( '/posts', 'PostController@index' )->name( 'posts.index' );

Route::get( '/latest', 'PostController@lastPost' )->name( 'latest' );
Route::get( '/status', 'PostController@status' )->name( 'status' );