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

Route::get('/', [
    'as' => 'welcome',
    function () {
        return View::make('master');
    }
]);

Route::resource('user', 'UsersController');
Route::resource('listing', 'ListingController');
Route::resource('market', 'MarketController');
Route::resource('series', 'SeriesController');
Route::resource('card', 'CardController');


Route::get('user/profile', array(
    'as' => 'profile',
    'uses' => 'UsersController@show'
));

Route::get('search/cards/', array(
    'as' => 'cards.search',
    'uses' => 'CardController@cardSearch'
));

Route::get('password/reset', array(
    'as' => 'password.remind',
    'uses' => 'PasswordController@remind',
));

Route::post('password/reset', array(
    'as' => 'password.request',
    'uses' => 'PasswordController@request'

));

Route::get('password/reset/{token}', array(
    'uses' => 'PasswordController@reset',
    'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
    'uses' => 'PasswordController@update',
    'as' => 'password.update'
));

Route::get('register', array(
    'as' => 'registration',
    'uses' => 'UsersController@registration'
));

Route::post('register', array(
    'as' => 'registered',
    'uses' => 'UsersController@store'
));

Route::get('login', array(
    'as' => 'login',
    'uses' => 'UsersController@login'
));

Route::post('login', function () {
    if (Auth::attempt(Input::only('username', 'password'))) {
        return Redirect::intended('/');
    } else {
        return Redirect::back()
            ->withInput()
            ->with('error', "Invalid credentials");
    }
});

// Routes that requires authentication before becoming viewable
Route::group(['before' => 'auth'], function () {
        // Has Auth Filter
        Route::get('logout', function () {
            Auth::logout();
            return Redirect::to('/')
                ->with('message', 'You have logged out');
        });
    }
);

// if it is a feature not ready place it here plx
Route::group(['before' => 'env'], function () {

    Route::group(['before' => 'auth'], function () {
        Route::get('basket', [
            'uses' => 'BasketController@showBasket',
            'as' => 'basket'
        ]);

        Route::post('addToBasket', [
            'uses' => 'BasketController@addToBasket',
            'as' => 'addToBasket'
        ]);
    });

    Route::get('/market', [
        'as' => 'market',
        'uses' => 'MarketController@index'
    ]);

    Route::post('listings', function () {
        $listing = Listing::create(Input::all());
        return Redirect::to('market/' . $listing->card->id)
            ->with('message', 'Successfully created listing');
    });

    Route::put('listing/{id}', function ($id) {
        $listing = Listing::find($id);
        $listing->update(Input::all());
        return Redirect::to('lisitng/' . $lisitng->id)
            ->with('message', 'Successfully updated listing');
    });

    Route::delete('listing/{id}', function ($id) {
        $listing = Listing::find($id);
        $listing->delete();
        return Redirect::to('master')
            ->with('message', 'Successfully deleted listing');
    });

    // quicksearch
    Route::get('/quicksearch/cards/', function () {
        $query = Input::get('query');
        $cards = DB::table('cards')->where('name', 'LIKE', '%'.$query.'%')->take(4)->get();
        return Response::json($cards);
    });

});
