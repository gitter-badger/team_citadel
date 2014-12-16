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

// Routes for search result paginaiton ajax
Route::get('cards/ajax/{type}', [
    'as' => 'cards.type',
    'uses' => 'CardController@getCardsType'
])->where('type', 'weiss-schwarz|magic-the-gathering');


// Routes that requires authentication before becoming viewable
Route::group(['before' => 'auth'], function () {
    // Has Auth Filter
    Route::get('logout', function () {
        Auth::logout();
        return Redirect::to('/')
            ->with('message', 'You have logged out');
    });
});


Route::get('messages/create', [
    'as' => 'create.message',
    'uses' => 'ConversationsController@show'
    ]);

Route::post('message/create', [
    'as' => 'post.message',
    'uses' => 'ConversationsController@post'
    ]);


Route::get('messages/received', [
    'as' => 'received.message',
    'uses' => 'ConversationsController@received'
    ]);

Route::get('messages/sent', [
    'as' => 'sent.message',
    'uses' => 'ConversationsController@sent'
    ]);

Route::get('messages/reply/{username}', [
    'as' => 'reply.message',
    'uses' => 'ConversationsController@reply'
    ]);

Route::get('messages/delete/{username}',[
    'as' => 'delete.message',
    'uses' => 'ConversationsController@delete'
    ]);

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
        Route::get('/{deck_id}/edit', [
            'before' => 'owns:Deck',
            'as' => 'deck.edit',
            'uses' => 'DeckController@edit'
        ]);

        Route::get('/getcards', [
            'as' => 'addCardSearch',
            'uses' => 'DeckController@addCardSearch'
        ]);

        Route::get('/dropcard', [
            'as' => 'dropCard',
            'uses' => 'DeckController@removeCardsFromDeck'
        ]);

        Route::get('/create', [
            'as' => 'deck.create',
            'uses' => 'DeckController@create'
        ]);

        Route::group(['before' => 'csrf'], function () {

            Route::post('/create', [
                'as' => 'deck.store',
                'uses' => 'DeckController@store'
            ]);

            Route::post('/{deck_id}/edit', [
                'as' => 'deck.edit',
                'uses' => 'DeckController@update'
            ]);

            Route::post('/{deck_id}', [
                'as' => 'addCard',
                'uses' => 'DeckController@addCard'
            ])->where('deck_id', '[0-9]+');
        });
    });

});

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

Route::get('username/reset', array(
    'as' => 'username.remind',
    'uses' => 'PasswordController@usernameRemind'
));

Route::resource('user', 'UsersController');

Route::get('{gameName}/{seriesId}/{seriesName}/{id}/{cardName?}', [
    'as' => 'aCard.show',
    'uses' => 'CardController@show'
]);

Route::get('login', array(
    'as' => 'login',
    'uses' => 'UsersController@login'
));

Route::get('search/cards/', array(
    'as' => 'cards.search',
    'uses' => 'CardController@cardSearch'
));

Route::get('{gameName}/{id}/{seriesName?}', [
    'as' => 'set.show',
    'uses' => 'SeriesController@show'
])->where('id', '[0-9]+');

Route::get('/{gameName}', [
    'as' => 'games.show',
    'uses' => 'GameController@show'
]);

Route::get('sendemail', [
    'as' => 'send.email',
    function () {
        Mail::send('emails.test', array(), function ($message) {
            $message->to('adamjama7@gmail.com', 'John Smith')->subject('Welcome!')->from('ajama@alacrityfoundation.com', 'Adam Jama');
        });
    }
]);

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

Route::resource('listing', 'ListingController');
Route::resource('market', 'MarketController');
Route::resource('series', 'SeriesController');
Route::resource('card', 'CardController');
Route::resource('game', 'GameController');
Route::resource('rating', 'RatingController');
Route::resource('comment', 'CommentController');

Route::get('user/{username}/edit', [
    'as' => 'edit.user',
    'uses' => 'UsersController@edit'
]);

Route::post('login', function () {
    if (Auth::attempt(Input::only('username', 'password'))) {
        return Redirect::to('/');
    } else {
        return Redirect::route('login')
            ->withInput()
            ->with('error', "Invalid credentials");
    }
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
});

Route::group(['before' => 'auth'], function () {
    // Has Auth Filter
    Route::post('rating/update/{card_id}', [
            'as' => 'rating.update',
            'uses' => 'RatingController@update'
    ]);
});
