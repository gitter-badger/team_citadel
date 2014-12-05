<?php
class CardController extends \BaseController
{
    public function show($id)
    {
<<<<<<< HEAD
=======
        //
>>>>>>> 27a5362e9690b25edfd4e41c2a0ba2ed160339bb
        $card = Card::find($id);
        $rateables = $card->series->game->rateables;
        $previousUserRatings = [];

        // get the average for each rateable.
        if(Auth::check()) {
            foreach ($rateables as $rateable) {
                $previousUserRatings[$rateable->name] = Rating::whereCardId($id)
                    ->whereRateableId($rateable->id)
                    ->whereUserId(Auth::user()->id)
                    ->pluck('value');
            }
        }

        return View::make('card', compact('card', 'rateables', 'previousUserRatings'));
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