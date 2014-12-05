<?php
class SeriesController extends \BaseController {

	public function index()
	{
		$series = Series::with('cards')->paginate(24);
		return View::make('series', compact('series'));
	}

	public function show($id)
	{
		//
		$aSeries = Series::find($id);
		$aSeriesCards = Card::whereSeriesId($id)->paginate(24);
		return View::make('cards', compact('aSeries', 'aSeriesCards'));
	}
}