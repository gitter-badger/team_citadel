<?php

class DeckController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $decks = Deck::orderBy('decks.created_at', 'desc')->paginate(10);
        return View::make('decks.index', compact('decks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $deck = new Deck;
        $games = Game::all()->lists('name', 'id');
        $method = 'create';

        return View::make('decks.edit', compact('deck', 'method', 'games'));
    }

    public function postDeck()
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
            return Redirect::route('newDeck')
                    ->withInput($values)
                    ->withErrors($validator);
        } else {
            $deck = new Deck;
                $deck->title = Input::get('title');
                $deck->game_id = Input::get('game_id');
                $deck->description = Input::get('description');

            if ($deck->save()) {
                $deck->users()->sync([Auth::user()->id]);
                return Redirect::route('getDeck', $deck->id)->with('success', 'The Deck was Created');
            } else {
                return Redirect::route('newDeck')->with('fail', 'An Error Occurred while Saving');
            }
        }

        return $values;
    }

    public function addCard($deck_id)
    {
        $deck = Deck::find($deck_id);

        return var_dump($deck->games);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($deck_id)
    {
        $deck = Deck::find($deck_id);
        $series = $deck->game->series;
        $cards = $deck->game->cards;
        return  View::make('decks.show', compact('deck', 'series', 'cards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCardSearch()
    {
        $game = Game::find(1);
        $term = Input::get('term');
        $cards = $game->cards()
                        ->whereRaw("MATCH(cards.name) AGAINST('+$term*' IN BOOLEAN MODE)")
                        ->get()
                        ->load('series')
                        ->toArray();

        return Response::json(['data' => $cards]);
    }
}
