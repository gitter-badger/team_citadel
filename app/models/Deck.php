<?php

class Deck extends Eloquent
{
    protected $table = 'decks';
    protected $guard = 'id';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function cards()
    {
        return $this->belongsToMany('Card');
    }

    public function game()
    {
        return $this->belongsTo('Game');
    }

    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    public function getUrlAttribute() {
        return URL::route('deck.show', $this->id);
    }
}
