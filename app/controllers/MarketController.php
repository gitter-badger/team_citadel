<?php

class MarketController extends \BaseController
{

    public function index()
    {
        // get all the series
        $series = Series::all();
        $cards = Card::paginate(10);

        return View::make('market', compact('series', 'cards'));
    }

    public function show($id)
    {
        //
        $card = Card::find($id);
        $listings = Listing::where('card_id', $id)->orderBy('listing_cost', 'asc')->paginate(5);
        return View::make('market-listing', compact('card', 'listings'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
