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

		//$values['image'] = Input::file('image');

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

	public function edit($username){

        $user = User::where('username', $username)->first();
        $authUser = Auth::user();

        if ($authUser == null) {
            return Redirect::to('login')->with('message', 'Please log in!');
        }

        elseif ($authUser->id != $user->id) {
            return Redirect::to('login')->with('message', 'This is not your profile!');
        }

        else {
		$first_name = $user->first_name;
    	$last_name = $user->last_name;
    	$username = $user->username;
    	$email = $user->email;
        $title = $user->title;
        $location = $user->location;
        $date_of_birth = $user->date_of_birth;

        return View::make('update', compact('first_name', 'last_name', 'username', 'email', 'user', 'title', 'location','date_of_birth'));
		}
	}

    public function update($username) {

        $user = User::whereUsername($username)->firstOrFail();
        $userInfo = Input::only(
            'title',
            'username',
            'email',
            'image',
            'date_of_birth',
            'location',
            'first_name',
            'last_name'
        );

        $rules = [
            'username' => 'required|unique:users,username,'. $user->id,
            'email' => 'required|unique:users,email,'. $user->id
        ];
        // Pass the rule to update the rule for username in this method

        $validator = Validator::make($userInfo, $rules);


        if ($validator->passes())
        {
            // move and store new image
            if (Input::hasFile('image')) {
                // construct the image path
                $image = Input::file('image');
                $destinationPath = public_path() . '/images/users/';
                $filename = $user->id . '.jpeg';

                // now move the image into storage
                Input::file('image')->move($destinationPath, $filename);
            }

            // update the user model
            // to prevent an attempt to insert the image into the database directly (rather than
            // the URL) update the image property
            unset($userInfo['image']);
            $user->update($userInfo);

            // redirect back to the profile view
            return Redirect::route('user.show', $user->username)
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Successfully updated Profile');
        }

        return Redirect::route('user.edit', $username)
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'There were validation errors.');
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
