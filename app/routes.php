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

Route::get('tinker', function () {
    return Listing::first()->seller;
    return DB::getQueryLog();
});

Route::get('/', function()
{
    return View::make('master');
});

Route::resource('user', 'UsersController'); 
Route::resource('listing', 'ListingController');
Route::resource('market', 'MarketController'); 


Route::get('user/profile', array(
    'as' => 'profile',
    'uses' => 'UsersController@show'
   
));

Route::get('search/cards/', array(
    'as' => 'listedSearch',
    function() {
    $query = Input::get('query');
    $cards = Card::where('cards.name', 'LIKE', '%'.$query.'%')->paginate(10);
    return View::make('result')
        ->with('cards', $cards)
        ->with('query', $query);
}));

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

Route::get('/market', [
    'as' => 'market',
    'uses' => 'MarketController@index'
]);

Route::post('listings', function() {
    $listing = Listing::create(Input::all());
    return Redirect::to('market/' . $listing->card->id)
        ->with('message', 'Successfully created listing');
});

Route::put('listing/{id}', function($id) {
    $listing = Listing::find($id);
    $listing->update(Input::all());
    return Redirect::to('lisitng/' . $lisitng->id)
        ->with('message', 'Successfully updated listing');
});

Route::delete('listing/{id}', function($id) {
    $listing = Listing::find($id);
    $listing->delete();
    return Redirect::to('master')
        ->with('message', 'Successfully deleted listing');
});

