<?php

class Rating extends Eloquent
{
    protected $table = 'ratings';
    protected $guarded = ['id'];

    // a rateable can have many ratings
    public function rateables() {
        return $this->belongsToMany('Rateable');
    }

    // a card will have many ratings
    public function cards() {
        return $this->belongsToMany('Card');
    }
}