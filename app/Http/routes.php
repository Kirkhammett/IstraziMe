<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/locations', 'LocationController@index');

Route::get('/locations', [
    'uses' => 'LocationController@index',
    'as' => 'locations',
    'middleware' => 'auth'
]);

Route::get('/locations/{slug}', [
    'uses' => 'LocationController@show',
    'as' => 'locations.show',
    'middleware' => 'auth'
]);

Route::post('/createcomment/{loc_id}', [
    'uses' => 'CommentController@createComment',
    'as' => 'comment.create',
    'middleware' => 'auth'
]);

Route::get('/deletecomment/{comment_id}', [
    'uses' => 'CommentController@deleteComment',
    'as' => 'comment.delete',
    'middleware' => 'auth'
]);

Route::bind('comments', function($value, $route){
    return App\Comment::whereLocationId($value)->first();
});

/*
Route::bind('locations', function($value, $route){
    return App\Location::whereSlug($value)->first();
});
*/

// Added NOW
// Provide controller methods with object instead of ID
Route::model('comments', 'Comment');
Route::model('locations', 'Location');