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

<<<<<<< HEAD
Route::get('user/create', array(
	'as' => 'registration',
	'uses' => 'UsersController@registration'
));


=======
Route::get('login', function() {
	return View::make('login');
});
>>>>>>> 5e0668950a7a58a8e08b27e9a21beec30b86b9fd
