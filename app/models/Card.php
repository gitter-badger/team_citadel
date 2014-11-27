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
        return $this->belongsToMany('Attribute')->withPivot('value');
    }

    public function listings()
    {
        return $this->hasMany('Listing');
    }

    public function getUrlAttribute()
    {
        return URL::route('card.show', $this->id);
    }
    
    public function decks()
    {
        return $this->belongsToMany('Deck');
    }
}
