<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('master');
});

Route::resource('user', 'UsersController');

Route::resource('market','MarketController'); 

Route::get('register', array(
	'as' => 'registration',
	'uses' => 'UsersController@registration'
));

Route::post('register', array(
	'as' => 'registered',
	'uses' => 'UsersController@store'
)); 

Route::get('login', function() {
    return View::make('login');
});

Route::post('login', function() {
    if(Auth::attempt(Input::only('username', 'password'))) {
        return Redirect::intended('/');
    } else {
        return Redirect::back()
            ->withInput()
            ->with('error', "Invalid credentials");
    }
});

// Routes that requires authentication before becoming viewable
Route::group(['before' => 'auth'], function(){
    // Has Auth Filter 
    Route::get('logout', function() {
        Auth::logout();
        return Redirect::to('/')
            ->with('message', 'You have logged out');
    });
});
