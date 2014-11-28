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
		$values = Input::only(
			'username',
			'first_name',
			'last_name',
			'email',
			'password'
		);
		
		$values['image'] = Input::file('image');

		$rules = array(
			'image' => 'image',
			'email' => 'required|email|unique:users',
			'username' => 'required|unique:users',
			'first_name' => 'required|min:2',
			'last_name' => 'required|min:2',
			'password' => 'required|min:6');

		$validator = Validator::make($values, $rules);
		$firstMessage = ($validator->messages()->first());

		if($firstMessage){
				return Redirect::to('register')->with('message', $firstMessage)->withInput();	
		}

		$values['password'] = Hash::make( $values['password'] );

		$newUser = User::create($values);
		$image = Input::file('image');
        $destinationPath = 'public/images/users/';
        $filename = $newUser->id . '.jpeg';
       
        Input::file('image')->move($destinationPath, $filename);

		if($newUser){
			Auth::login($newUser);
			return Redirect::to('/');
		}
		return Redirect::route('create')->withInput();
	}

	public function show($username){
		$user = User::where('username', $username)->first();
		$authUser = Auth::user();
		if($authUser == null){
			return Redirect::to('login')->with('message', 'Please log in!');
		}
		else if ($authUser->id != $user->id) {
			return 'this is not your profile dont be nosey';
		}
		else {
			$decks = $this->getUserWall($user->id);
			return View::make('profile', compact('user', 'decks'));
		}
	}

    public function getUserWall($userId)
    {
        $user = User::find($userId);
        return $user->decks;
    }
    public function login()
    {
        return View::make('login');
    }
}
