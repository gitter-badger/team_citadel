<?php
class SeriesController extends \BaseController {

	public function index()
	{
		$series = Series::with('cards')->paginate(24);
		return View::make('series', compact('series'));
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
	public function show($gameName, $id)
	{
		//
		$aSeries = Series::with('cards')->find($id);
		$aSeriesCards = $aSeries->cards()->paginate(24);
		return View::make('cards', compact('aSeries', 'aSeriesCards'));
	}
}