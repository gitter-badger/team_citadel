<?php

class BasketController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showBasket()
    {
        $basketItems = Listing::where('buyer_id', Auth::user()->id)
            ->where('sales_status', 'staged')->get();

        $basketTotal = $basketItems->sum('listing_cost');
        $postageTotal = $basketItems->sum('postage_cost');
        // The basket item number
        $itemNumberInBasket = 0;

        return View::make('basket', compact('basketItems', 'itemNumberInBasket', 'basketTotal', 'postageTotal'));
    }

    public function addToBasket()
    {
        $listing_id = Input::get('listing_id');
        $listing = Listing::find($listing_id);

        $listing->buyer_id = Auth::user()->id;
        $listing->sales_status = 'staged';
        $listing->save();

        return View::make('basket');
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
}
