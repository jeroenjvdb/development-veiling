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

Route::get('/', ['as' => 'home', 'uses' => 'MainController@dashboard']);
Route::get('/FAQ', ['as' => 'FAQ', 'uses' => 'MainController@FAQ']);

Route::get('/register', ['as' => 'auth.register', 'uses' => 'UserController@create']);
Route::post('/register', [ 'uses' => 'Auth\AuthController@register']);
Route::get('/auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

Route::get('/profile', ['as' => 'profile', 'uses' => 'UserController@overview']);


Route::resource('user', 'UserController');
Route::get('/art/my-auctions', ['as' => 'myAuctions', 'uses' => 'ArtController@myAuctions']);
Route::post('/art/search', ['as' => 'art.search', 'uses' => 'ArtController@search']);
Route::get('/art/{id}/buynow', [ 'as' => 'art.buynow', 'uses' => 'ArtController@buyNow' ]);
Route::resource('art', 'ArtController');
Route::resource('artist', 'ArtistController');

Route::post('/bid/{id}', ['as' => 'bid', 'uses' => 'BidController@create']);

Route::resource('picture', 'PictureController');

// Route::resource('watchlist', 'WatchlistController');
Route::get('/watchlist', ['as' => 'watchlist.index', 'uses' => 'WatchlistController@index']);
Route::get('/watchlist/create/{id}', ['as' => 'watchlist.create', 'uses' => 'WatchlistController@create']);

