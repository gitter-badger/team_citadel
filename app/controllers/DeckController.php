<?php

class DeckController extends \BaseController
{
    public function index()
    {
        $decks = Deck::orderBy('decks.created_at', 'desc')->paginate(10);
        return View::make('decks.index', compact('decks'));
    }

    public function create()
    {
        $deck = new Deck;
        $games = Game::all()->lists('name', 'id');
        $method = 'create';

        return View::make('decks.edit', compact('deck', 'method', 'games'));
    }

    public function store()
    {
        $values = Input::only(
            'game_id',
            'title',
            'description'
        );

        $validator = Validator::make($values, [
            'game_id' => 'required:decks,game_id',
            'title' => 'required:decks,title'
        ]);

        if ($validator->fails()) {
            return Redirect::route('deck.create')
                ->withInput($values)
                ->withErrors($validator);
        } else {
            $deck = new Deck;
            $deck->title = Input::get('title');
            $deck->game_id = Input::get('game_id');
            $deck->description = Input::get('description');
            $deck->user_id = Auth::id();

            if ($deck->save()) {
                return Redirect::route('deck.show', $deck->id)
                    ->with('success', 'The Deck was Created.');
            } else {
                return Redirect::route('welcome')
                    ->with('fail', 'An Error Occurred while Saving');
            }
        }

        return $values;
    }

    public function addCard()
    {
        $deck = Deck::find(Input::get('deck'));
        $usersSelection = Input::get('query');
        // maybe put this in js instead of on server.
        $cards = explode(',', $usersSelection);

        foreach ($cards as $card) {
            $deck->cards()->attach(intval($card));
        }

        return Redirect::route('deck.show', $deck->id);
    }

    public function show($deck_id)
    {
        $deck = Deck::find($deck_id);
        $series = $deck->game->series;
        $cards = $deck->game->cards;
        $comments = $deck->comments()->orderBy('created_at', 'desc')->get();
        return  View::make('decks.show', compact('deck', 'series', 'cards', 'comments'));
    }

    public function edit($id)
    {
        $deck = Deck::find($id);
        $games = Game::find($deck->game_id)->first();
        $method = 'edit';

        return View::make('decks.edit', compact('deck', 'method', 'games'));
    }

    public function update()
    {
        $deck = Deck::find(Input::get('deck'));
        $deck->title = Input::get('title');
        $deck->description = Input::get('description');

        if ($deck->save()) {
            return Redirect::route('deck.show', $deck->id)
                ->with('success', 'The Deck was Created');
        } else {
            return Redirect::route('welcome')
                ->with('fail', 'An Error Occurred while Saving');
        }
    }

    public function destroy($id)
    {
        // destroy the deck
        return Redirect::route('welcome')
            ->with('fail', 'An Error Occurred while Saving');
    }

    public function addCardSearch()
    {
        $game = Game::find(Input::get('game'));
        $term = Input::get('term'); // search term
        $cards = $game->cards()
            ->whereRaw("MATCH(cards.name) AGAINST('+$term*' IN BOOLEAN MODE)")
            ->get()
            ->load('series')
            ->toArray();

        return Response::json(['data' => $cards]);
    }

    public function removeCardsFromDeck()
    {
        $deck = Deck::find(Input::get('deck'));
        $deck->cards()->detach(Input::get('card'));
    }
}
