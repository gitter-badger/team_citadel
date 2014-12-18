<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Pichkrement\Messenger\Models\User  implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    protected $guarded = ['id'];

    public function listings()
    {
        return $this->hasMany('Listing');
    }

    public function addresses()
    {
        return $this->hasMany('Address');
    }

    public function decks()
    {
        return $this->hasMany('Deck');
    }

    // Use this to retrun the url from a users model
    public function userURL()
    {
        return 'user/'.$this->username;
    }

    //received messages
    public function messages()
    {
        return $this->hasMany('Pichkrement\Messenger\Models\Message');
    }

    //messages the user has sent
    public function conversations()
    {
        return $this->belongsToMany('Pichkrement\Messenger\Models\Conversation');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function getImageAttribute() 
    {
        if (file_exists(public_path() . '/images/users/' . $this->id .'.jpeg')) {
            return '/images/users/' . $this->id .'.jpeg';
        } else {
            return 'http://www.pclodge.com/wp-content/uploads/2014/08/placeholder.png';        
        }
    }
}
