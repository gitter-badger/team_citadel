<?php

class Series extends Eloquent
{
    protected $table = 'series';
    protected $guard = 'id';

    public function games()
    {
        return $this->belongsTo('Game');
    }

    public function cards()
    {
        return $this->hasMany('Card');
    }
}
