<?php

class ListingController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all of the currently live listings
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // show form to add a new listing
        $cards = Card::all();
        $method = 'post';
        return View::make('create-listing', compact('method','cards'));
        // return View::make(route, compact(stuff-required-for-this-view));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // save the new listing

        // $listingData = Input::only(
        //    // names of the form elements we want to use in here
        // );

        // check it conforms to our requirements
        // $validator = Validator::make($listingData, [
        //     // validation rules go here
        // ]);

        // if ($validator->fails()) {
        //     // what do we return if it fails to add?
        // }
        // else {
        //     $listing = Listing::create($listingData);

        //     return $listing;
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        $card = Card::find($listing->card_id);
        $method = '';
        return View::make('create-listing', compact('listing', 'method','card'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // show form to edit a listing
        $listing = Listing::find($id);
        $method = 'put';
        return View::make('create-listing', compact('listing', 'method'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
    //  // save changes to the listing
        // $listing = Listing::find($id);

        // $listingData = Input::only(
        //     // names of the form elements we want to use in here
        // );

        // $validator = Validator::make($listingData, [
        //     // validation rules go here
        // ]);

        // if ($validator->fails()) {
        //     // what do we do if it fails?
        // }
        // else {
        //     // update the listing
        //     $listing->update($listingData);
        //     return $listing;
        // }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete the listing
        $listing = Listing::find($id);
        $method = 'delete';
        return View::make('create-listing', compact('listing', 'method'));
    }


}