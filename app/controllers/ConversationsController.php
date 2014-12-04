<?php

class ConversationsController extends \BaseController {

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
		//creating a new Conversation
		$conversation = Conversation::create(
			array(
				'name' => 'Magic The Gathering'
				)
			);

		// add authenticated User 
		$conversation->users()->attach(Auth::user()->id);

		//create new Message
		Message::create(
			array(
				'content' => "I love football",
				'user_id' => '80',
				'conversation_id' =>  $conversation->id 
				)
			);
		
		//add other Participants 
		// //get all Messages from a single conversation as array
		// $data = Conversation::findOrFail($id)->messages()->get()->toArray();

		// //get all conversations from the authenticated user
		// $data = Auth::user()->conversations()->get()->toArray();

		// //get one attribute form all members of a conversation (here the firstname)
		// array_fetch( Conversation::find($conv_id)->users->toArray(), 'firstname' );

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
