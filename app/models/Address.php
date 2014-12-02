<?php

class Address extends Eloquent
{

    protected $table = 'address';
    protected $guard = 'id';

    public function user()
    {
        return $this->belongsTo('User');
    }
}
