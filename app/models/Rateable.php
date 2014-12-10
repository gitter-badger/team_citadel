<?php

class Rateable extends Eloquent
{
    protected $table = 'rateables';
    protected $guarded = ['id'];

    // Rateables will be used on multiple cards
    public function cards() {
        return $this->belongsToMany('Card');
    }

    public function game() {
        return $this->belongsTo('Game');
    }

    public function ratings() {
        return $this->belongsToMany('Rating');
    }

}