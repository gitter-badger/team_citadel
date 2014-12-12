<?php

class Game extends Eloquent
{
    protected $table = 'games';
    protected $guard = 'id';

    public function series()
    {
        return $this->hasMany('Series');
    }

    public function cards()
    {
        return $this->hasManyThrough('Card', 'Series');
    }

    public function decks()
    {
        return $this->hasMany('Deck');
    }

    public function rateables()
    {
        return $this->hasMany('Rateable');
    }

    public function getUrlAttribute() {
        return Str::slug($this->name);
    }
}
