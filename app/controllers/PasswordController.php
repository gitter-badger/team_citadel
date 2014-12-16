<?php

use Illuminate\Auth\Reminders\PasswordBroker;

class PasswordController extends BaseController
{

    public function remind()
    {
        return View::make('user.password.remind');
    }

    public function usernameRemind()
    {
        return View::make('user.username.remind');
    }

    public function reset($token)
    {
        return View::make('user.password.reset')->with('token', $token);
    }

    public function usernamereset($token)
    {
        return View::make('user.username.reset')->with('token', $token);
    }

    public function request()

    {
        $result = Password::remind( Input::only('email'), function($message) {
            $message->subject('Password Reminder');
            $message->from('noreply@deckcitadel.com', 'Deck Citadel');
        }, 'emails.auth.passwordreminder');

        $message = Lang::get($result);
        if ($result == PasswordBroker::REMINDER_SENT) {
        // TODO: take the user to homepage with email sent message
            return Redirect::route('welcome')->with('message', $message);
        } else {
            return Redirect::route('welcome')->with('error', $message);
        }
    }

    public function usernamerequest()
    {
        // Grab first user with specified username
        $user = User::whereEmail(Input::only('email'))->first();
        if ($user) {
            Mail::send('emails.auth.usernamereminder', ['username' => $user->username], function($message) use ($user) {
                $message->to($user->email, $user->first_name . ' ' . $user->last_name)
                    ->from('noreply@deckcitadel.com', 'Deck Citadel')
                    ->subject('Username Reminder');
            });
            return Redirect::route('welcome')->with('message', 'Username reminder sent!');
        } else {
            return Redirect::route('welcome')->with('error', 'An account with that email address does not exist!');
        }
    }

    public function usernameupdate()
    {
        $credentials = [
            'email' => Input::get('email'),
            // We need to trick password reset mechanism for username
            'password' => Input::get('username'),
            'password_confirmation' => Input::get('username_confirmation'),
            'token' => Input::get('token')
        ];

        $result = Password::reset($credentials, function($user, $username)
            {
                $user->username = ($username);
                $user->save();
            });

        if (PasswordBroker::PASSWORD_RESET == $result) { // i.e. Success
            return Redirect::to('login')->with('message', 'Your username has been reset, please log in!');
        } else if (PasswordBroker::INVALID_PASSWORD == $result) {
            return Redirect::to('username/reset/{token}')->withInput()->with('error', 'Your username do not match!');
        } else if (PasswordBroker::INVALID_USER == $result) {
            return Redirect::to('username/reset/{token}')->withInput()->with('error', 'Email address not found!');
        } else if (PasswordBroker::INVALID_TOKEN == $result) {
            return Redirect::to('username/reset/{token}')->withInput()->with('error', 'Invalid token!');
        }
    }

    public function update()
    {
        $credentials = array('email' => Input::get('email'),
        'password' => Input::get('password'),
        'password_confirmation' => Input::get('password_confirmation'),
        'token' => Input::get('token'));

        $result = Password::reset($credentials, function($user, $password)
            {
                $user->password = Hash::make($password);
                $user->save();
            });

        if (PasswordBroker::PASSWORD_RESET == $result) { // i.e. Success
            return Redirect::to('login')->with('message', 'Your password has been reset, please log in!');
        } else if (PasswordBroker::INVALID_PASSWORD == $result) {
            return Redirect::to('password/reset/{token}')->withInput()->with('error', 'Your passwords do not match!');
        } else if (PasswordBroker::INVALID_USER == $result) {
            return Redirect::to('password/reset/{token}')->withInput()->with('error', 'Invalid user!');
        } else if (PasswordBroker::INVALID_TOKEN == $result) {
            return Redirect::to('password/reset/{token}')->withInput()->with('error', 'Invalid token!');
        }
    }
}