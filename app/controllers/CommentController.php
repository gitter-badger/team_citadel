<?php

class CommentController extends \BaseController {

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
		$values = Input::all();
		$type = $values['type'];
		$values['user_id'] = Auth::id();

		$validator = Validator::make($values, [
		    'comment' => 'required|min:5,4000'
		]);

		$commentable = $type::find($values['id']);
		if ($validator->fails()) {
			return Redirect::to($commentable->url)
				->withErrors($validator)
				->withInput();
		} else {
		    $comment = $commentable->comments()->create(['comment'=> $values['comment']]);
		    $comment['user_id'] = $values['user_id'];
		    $comment->save();
		}

		return $comment;
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
