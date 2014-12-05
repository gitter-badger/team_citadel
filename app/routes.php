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
});


Route::get('/', [
    'as' => 'welcome',
    function () {
        return View::make('welcome');
    }
]);

Route::resource('user', 'UsersController');
Route::resource('listing', 'ListingController');
Route::resource('market', 'MarketController');
Route::resource('series', 'SeriesController');
Route::resource('card', 'CardController');
Route::resource('rating', 'RatingController');



Route::get('sendemail', [
    'as' => 'send.email',
    function() {
        Mail::send('emails.test', array(), function($message) {
            $message->to('adamjama7@gmail.com', 'John Smith')->subject('Welcome!')->from('ajama@alacrityfoundation.com', 'Adam Jama');
        });
    }
]);

Route::get('search/cards/', array(
    'as' => 'cards.search',
    'uses' => 'CardController@cardSearch'
));

Route::get('username/reset', array(
    'as' => 'username.remind',
    'uses' => 'PasswordController@usernameRemind'
    ));

Route::post('username/reset', array(
    'as' => 'username.request',
    'uses' => 'PasswordController@usernamerequest'
    ));

Route::get('username/reset/{token}', array(
    'as' => 'username.reset',
    'uses' => 'PasswordController@usernamereset',
));

Route::post('username/reset/{token}', array(
    'as' => 'username.update',
    'uses' => 'PasswordController@usernameupdate',
));

//Group for password reset
Route::group(['prefix' => 'password'], function () {
    Route::get('/reset', array(
        'as' => 'password.remind',
        'uses' => 'PasswordController@remind',
    ));

    Route::post('/reset', array(
        'as' => 'password.request',
        'uses' => 'PasswordController@request'

    ));

    Route::get('/reset/{token}', array(
        'uses' => 'PasswordController@reset',
        'as' => 'password.reset'
    ));

    Route::post('/reset/{token}', array(
        'uses' => 'PasswordController@update',
        'as' => 'password.update'
    ));
});

Route::get('user/{username}/edit', [
    'as' => 'edit.user',
    'uses' => 'UsersController@edit'
]);

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

    Route::post('rating/update/{id}', [
        'as' => 'rating.update',
        'uses' => 'RatingController@update'
    ]);

    Route::post('rating/store/{id}', [
        'as' => 'rating.store',
        'uses' => 'ratingController@store'
    ]);
});

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
    Route::get('/quicksearch/cards/', function() {
        $query = Input::get('query');
        $cards = DB::table('cards')->where('name', 'LIKE', '%'.$query.'%')->take(4)->get();
        return Response::json($cards);
    });

    // Group all deck routes together
    Route::group(['prefix' => 'decks'], function () {
        Route::get('/', [
            'as' => 'decks',
            'uses' => 'DeckController@index'
        ]);

        Route::get('/{deck_id}', [
            'as' =>  'deck.show',
            'uses' => 'DeckController@show'
        ])->where('deck_id', '[0-9]+');

        Route::group(['before' => 'auth'], function () {
            Route::get('/create', [
                'as' => 'deck.create',
                'uses' => 'DeckController@create'
            ]);

            Route::get('/{deck_id}/edit', [
                'as' => 'deck.edit',
                'uses' => 'DeckController@edit'
            ]);

            Route::get('/getcards', [
                'as' => 'addCardSearch',
                'uses' => 'DeckController@addCardSearch'
            ]);

            Route::group(['before' => 'csrf'], function () {
                Route::post('/create', [
                    'as' => 'deck.store',
                    'uses' => 'DeckController@store'
                ]);

                Route::post('/{deck_id}', [
                    'as' => 'addCard',
                    'uses' => 'DeckController@addCard'
                ])->where('deck_id', '[0-9]+');
            });
        });
    });
});
