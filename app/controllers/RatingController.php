<?php

class RatingController extends \BaseController {

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
        // insert rating into db
        $ratings = Input::get('ratingIds');

        foreach ($ratings as $key => $value) {
            Rating::create([
                'user_id'=> Auth::user()->id,
                'card_id' => Input::get('card_id'),
                'rateable_id' => $key,
                'value' => $value
            ]);
        }

        return $ratings;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        $ratings = Input::get('ratingIds');

        foreach ($ratings as $key => $value) {
            $rating = Rating::whereUserId(Auth::user()->id)
                ->whereCardId($id)
                ->whereRateableId($key)
                ->first();

            $rating->value = intval($value);
            $rating->save();
        }

        return $ratings;
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

    // get the average ratings for that card.
    public function getAverage($id) {
        // return the sum/count of all ratings where card_id = id

    }


}
