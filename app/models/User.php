<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
    protected $fillable = 
    [
        'first_name',
        'last_name',
        'email_address',
        'username',
        'password',
        'mobile_phone', 
        'home_telephone',
        'gender',
        'location',
        'title'
    ];

    public function address()
    {
        return $this->hasMany('Address');
    }
}
