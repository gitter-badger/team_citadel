<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Address extends Eloquent
{

    protected $table = 'address';
    protected $guard = 'id';

    public function users()
    {
        return $this->belongsTo('User');
    }
}
