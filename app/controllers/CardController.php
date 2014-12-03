<?php
class CardController extends \BaseController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Rating::where('card_id', $id)->avg('value')
        $card = Card::find($id);
        $rateables = $card->series->game->rateables;
        $averageRatings = [];

        foreach ($rateables as $rateable) {
            $averageRatings[$rateable->name] = round(Rating::where('card_id', $id)->where('rateable_id', $rateable->id)->avg('value'));
        }
        // $averageRatings = json_encode($averageRatings);
        return View::make('card', compact('card', 'rateables', 'averageRatings'));
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

    public function cardSearch() {
        $query = Input::get('query');
        if($query) {
            $cards = Card::where('cards.name', 'LIKE', '%'.$query.'%')->get();
        } else {
            $cards = null;
        }
        return View::make('result', compact('cards', 'query'));
    }
}