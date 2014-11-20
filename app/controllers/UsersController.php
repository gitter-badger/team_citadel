<?php

class UsersController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function registration()
	{
		return View::make('create');
	}

	public function store()
	{
		$username = Input::get('username');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email_address = Input::get('email_address');
		$password = Hash::make((Input::get('password')));

		$newUser = User::create([
			'username' => $username, 
			'first_name' => $first_name, 
			'last_name' => $last_name, 
			'email_address' => $email_address, 
			'password' => $password, 
		]);

		if($newUser){
			Auth::login($newUser);
			return Redirect::to('/');
		}
		return Redirect::route('create')->withInput();
	}

	public function show($id)
	{
		$user = User::find($id);
        return View::make('profile', compact('user'));
	}
}	

