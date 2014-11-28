<?php

class Deck extends Eloquent
{
    protected $table = 'decks';
    protected $guard = 'id';

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function cards()
    {
        return $this->belongsToMany('Card');
    }

    public function games()
    {
        return $this->belongsTo('Game');
    }
}