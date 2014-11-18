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

<<<<<<< HEAD
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = ['first_name', 'last_name', 'email_address', 'password', 'username', 'mobile_phone', 'home_telephone', 'gender', 'location', 'title'];
=======
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
>>>>>>> 0b2afdc35b2bd98f191f566a23a731b55cda626e

    public function address()
    {
        return $this->hasMany('Address');
    }
}
