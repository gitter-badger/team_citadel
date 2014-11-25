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
    
    public function getUrlAttribute() {
        return URL::route('series.show', $this->id);
    }
}
