<?php

class Listing extends Eloquent
{
    protected $table = 'listings';
    protected $guard = ['id', 'user_id'];
    protected $fillable = [
        'game_id',
        'buyer_id',
        'postage_cost',
        'post_from',
        'post_to',
        'dispatch_date',
        'returns',
        'listing_cost',
    ];

    function items() {
        return $this->hasMany('Item');
    }

    public function card() {
        return $this->belongsTo('Card');
    }

    public function getCheapest() {
        return $Listing->orderBy('listing_cost', 'asc')->first();
    }
}
