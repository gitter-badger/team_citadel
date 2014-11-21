<?php

use Illuminate\Auth\Reminders\PasswordBroker;

class PasswordController extends BaseController {
 
  public function remind()
  {
    return View::make('password.remind');
  }

  public function reset($token)
  {
    return View::make('password.reset')->with('token', $token);

  }

  public function request()
  {
    $result = Password::remind( Input::only('email'), function($message)
    {
        $message->subject('Password Reminder');
        $message->from('support@icdb.com');
    });

    if ($result == PasswordBroker::REMINDER_SENT) {
        // all is ok!
        return 'YEEESSSSSSS';
    }
    else {
        return 'NOOOOO';
    }
  }
  
  public function update()
  {

    $credentials = Input::only('email');
 
    return Password::reset($credentials, function($user, $password)
    
    {
        $user->password = Hash::make($password);

        $user->save();

        return Redirect::to('login')->with('flash', 'Your password has been reset');
    });
 }
}