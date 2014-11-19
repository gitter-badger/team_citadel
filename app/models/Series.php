<?php

class Series extends Eloquent
{
    protected $table = 'series';
    protected $guard = 'id';

    public function game()
    {
        return $this->belongsTo('Game');
    }

    public function cards()
    {
        return $this->hasMany('Card');
    }
}
