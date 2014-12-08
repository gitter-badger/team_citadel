<?php

class RatingController extends \BaseController {

    public function store()
    {
        // insert rating into db
        $ratings = Input::get('ratingIds');
        $card = Card::find(Input::get('card_id'));

        foreach ($ratings as $key => $value) {
            Rating::create([
                'user_id'=> Auth::user()->id,
                'card_id' => $card->id,
                'rateable_id' => $key,
                'value' => $value
            ]);
        }

        return $card->average();
    }

    public function update($card_id)
    {
        $ratings = Input::get('ratingIds');
        $card = Card::find(Input::get('card_id'));
        foreach ($ratings as $key => $value) {
            $rating = Rating::whereUserId(Auth::user()->id)
                ->whereCardId($card->id)
                ->whereRateableId($key)
                ->first();

            $rating->value = intval($value);
            $rating->save();
        }

        return $card->average();
    }
}
