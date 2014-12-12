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
    public function show($gameName, $seriesName, $id)
    {
        // $card = Game::whereSlug($gameName)
        //     ->series()
        //     ->whereSlug($seriesName)
        //     ->cards()
        //     ->whereId($id);
        //
        $card = Card::find($id);
        $rateables = $card->series->game->rateables;
        $previousUserRatings = [];

        // get the average for each rateable.
        if (Auth::check()) {
            foreach ($rateables as $rateable) {
                $previousUserRatings[$rateable->name] = Rating::whereCardId($id)
                    ->whereRateableId($rateable->id)
                    ->whereUserId(Auth::user()->id)
                    ->pluck('value');
            }
        }

        switch ($gameName) {
            case 'weiss-schwarz':
                return View::make('card', compact('card', 'rateables', 'previousUserRatings'));

            case 'magic-the-gathering':
                return View::make('mtg-card', compact('card', 'rateables', 'previousUserRatings'));

            default:
                return App::abort(404);
        }
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

    }
    public function cardSearch()
    {
        $query = Input::get('query');
        if ($query) {
            $cards = Card::whereRaw("MATCH(cards.name) AGAINST('+$query*' IN BOOLEAN MODE) AND (cards.series_id) != 'N/A'")
                ->paginate(24);
        } else {
            $cards = null;
        }
        return View::make('search', compact('cards', 'query'));
    }
}
