<?php

class UsersController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    //open the register page for user
    public function create()
    {
        return View::make('user.create');
    }

    // Store Newly created user data
    public function store()
    {
        $values = Input::only(
            'username',
            'first_name',
            'last_name',
            'email',
            'password'
        );

        $rules = [
            'image' => 'image',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'password' => 'required|min:6'
        ];

        $validator = Validator::make($values, $rules);
        $firstMessage = ($validator->messages()->first());

        if ($firstMessage) {
            return Redirect::route('user.create')
                ->with('message', $firstMessage)
                ->withInput();
        }

        $values['password'] = Hash::make( $values['password'] );

        $newUser = User::create($values);

        // check if image exists
        if (Input::hasFile('image')) {
            $image = Input::file('image');
            $destinationPath =  public_path().'/images/users/';
            $filename = $newUser->id . '.jpeg';
            Input::file('image')->move($destinationPath, $filename);
        }

        if ($newUser) {
            Auth::login($newUser);
            return Redirect::to('/');
        }

        return Redirect::route('user.show')
            ->withInput();
    }

    public function edit($username)
    {

        $user = User::where('username', $username)->first();
        $authUser = Auth::user();

        if ($authUser == null) {
            return Redirect::to('login')->with('message', 'Please log in!');

        } elseif ($authUser->id != $user->id) {
            return Redirect::to('login')->with('message', 'This is not your profile!');

        } else {
            return View::make('user.update', compact('user'));
        }
    }

    public function update($username)
    {
        // discard parameter
        $user = Auth::user();
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

        if ($validator->passes()) {
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

    public function show($username)
    {
        $user = User::where('username', $username)->first();
        $decks = $this->getUserWall($user->id);
        $method = 'sent';

        $decks = $this->getUserWall($user->id);

        if($user->conversations) {
            $conversations = $user->conversations()->orderBy('created_at', 'DESC')->get();
            $messages = Message::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        }
        //$conversations = Conversation::where('users', $authUser->id)->orderBy('created_at', 'DESC')->get();
        return View::make('user.profile', compact('conversations', 'method', 'user', 'decks', 'messages'));
    }


    //gets the wall posts for the user
    public function getUserWall($userId)
    {
        $user = User::find($userId);
        return $user->decks;
    }

    public function login()
    {
        return View::make('user.login');
    }
}
