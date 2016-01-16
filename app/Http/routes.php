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
Route::bind('auction', function($slug){
	return App\Art::where('slug', $slug)->first();
});


Route::get('/language/{lang}', 				array('as' => 'language.select', 'uses' => 'MainController@setLocale'));


Route::get('/', ['as' => 'home', 'uses' => 'MainController@dashboard']);
Route::get('/FAQ', ['as' => 'FAQ', 'uses' => 'MainController@FAQ']);
Route::get('/contact/{auction?}', ['as' => 'contact', 'uses' => 'MainController@contact']);
Route::post('/contact',['uses' => 'MainController@postContact']);

Route::get('/register', ['as' => 'auth.register', 'uses' => 'UserController@create']);
Route::post('/register', [ 'uses' => 'Auth\AuthController@register']);
Route::get('/auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);

Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

Route::get('/password/email', ['as' => 'password.email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('/password/email', ['uses' => 'Auth\PasswordController@postEmail']);
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

Route::get('/profile', ['as' => 'profile', 'uses' => 'UserController@overview']);

Route::resource('user', 'UserController');

// art resources
Route::get('/art', ['as' => 'art.index', 'uses' => 'ShowAuctionsController@listArt']);
Route::get('/art/create', ['as' => 'art.create', 'uses' => 'ArtController@create']);
Route::post('/art', ['as' => 'art.store', 'uses' => 'ArtController@store']);
Route::get('/art/show/{auction}', ['as' => 'art.show', 'uses' => 'ArtController@show']);

// extra art links
Route::get('/art/filter/{sort}/{class?}/{filter?}', ['as' => 'art.filter', 'uses' => 'ShowAuctionsController@listArt']);
Route::get('/my-auctions', ['as' => 'myAuctions', 'uses' => 'ArtController@myAuctions']);
Route::get('/my-bids', ['as' => 'myBids', 'uses' => 'UserController@myBids']);

Route::get('/search/{search}/{sort?}/{class?}/{filter?}', ['as' => 'art.search', 'uses' => 'ShowAuctionsController@search']);
Route::post('/search', ['uses' => 'ShowAuctionsController@postSearch']);
Route::get('/art/{id}/buynow', [ 'as' => 'art.buynow', 'uses' => 'ArtController@buyNow' ]);

// Route::get('/art/{id}/buynow', [ 'as' => 'art.index', 'uses' => 'ArtController@buyNow' ]);


Route::resource('artist', 'ArtistController');

Route::post('/bid/{id}', ['as' => 'bid', 'uses' => 'BidController@create']);

Route::resource('picture', 'PictureController');

// Route::resource('watchlist', 'WatchlistController');
Route::get('/watchlist', ['as' => 'watchlist.index', 'uses' => 'WatchlistController@index']);
Route::get('/watchlist/create/{id}', ['as' => 'watchlist.create', 'uses' => 'WatchlistController@create']);

