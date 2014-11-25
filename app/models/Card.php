<?php

class Card extends Eloquent
{
    protected $table = 'cards';
    protected $guard = 'id';

    public function series()
    {
        return $this->belongsTo('Series');
    }

    public function attributes()
    {
        return $this->belongsToMany('Attribute');
    }

    public function listings()
    {
        return $this->hasMany('Listing');
    }

    public function decks()
    {
        return $this->belongsToMany('Deck');
    }
}
