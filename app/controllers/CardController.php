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
        //
        $card = Card::find($id);
        $gameName = $card->series->game->name;
        switch ($gameName) {
            case 'Weiss Schwarz':
                return View::make('card', compact('card'));

            case 'Magic The Gathering':
                return View::make('mtg-card', compact('card'));

            default:
                return 'lol';
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