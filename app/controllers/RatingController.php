<?php

class RatingController extends \BaseController {

    public function store($id)
    {
        // insert rating into db
        $ratings = Input::get('ratingIds');
        $card = Card::find($id);

        foreach ($ratings as $key => $value) {
            Rating::create([
                'user_id'=> Auth::user()->id,
                'card_id' => Input::get('card_id'),
                'rateable_id' => $key,
                'value' => $value
            ]);
        }

        return $card->average();
    }

    public function update($id)
    {
        $ratings = Input::get('ratingIds');
        $card = Card::find($id);
        foreach ($ratings as $key => $value) {
            $rating = Rating::whereUserId(Auth::user()->id)
                ->whereCardId($id)
                ->whereRateableId($key)
                ->first();

            $rating->value = intval($value);
            $rating->save();
        }

        return $card->average();
    }
}
