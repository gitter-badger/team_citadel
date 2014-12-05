<?php
class CardController extends \BaseController
{
    public function show($id)
    {
        //
        $card = Card::find($id);
        return View::make('card', compact('card'));
    }

    public function cardSearch() {
        $query = Input::get('query');
        if($query) {
            $cards = Card::whereRaw("MATCH(cards.name) AGAINST('+$query*' IN BOOLEAN MODE)")
                ->get();
        } else {
            $cards = null;
        }
        return View::make('result', compact('cards', 'query'));
    }
}