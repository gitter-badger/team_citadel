<?php

class Listing extends Eloquent
{
    protected $table = 'listings';
    protected $guarded = ['id', 'user_id'];

    function items() {
        return $this->hasMany('Item');
    }

    public function user() {
        return $this->belongsTo('User');
    }

    public function card() {
        return $this->belongsTo('Card');
    }

    public function seller() {
        return $this->belongsTo('User');
    }

    public function getCheapest() {
        return $Listing->orderBy('listing_cost', 'asc')->first();
    }
}
