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

Route::get('login', function() {
    return View::make('login');
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