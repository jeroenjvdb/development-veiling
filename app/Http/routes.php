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

Route::get('/', 'mainController@dashboard');

Route::get('/register', 'UserController@create');
Route::post('/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

Route::resource('user', 'UserController');
Route::resource('art', 'ArtController');
Route::resource('artist', 'ArtistController');
Route::resource('bid', 'BidController');
Route::resource('picture', 'PictureController');
Route::resource('watchlist', 'WatchlistController');
