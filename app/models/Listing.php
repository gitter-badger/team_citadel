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

<<<<<<< HEAD
    function items() {
        return $this->hasMany('Item');
=======
    public function card() {
        return $this->belongsTo('Card');
    }

    public function getMinPriceAttribute() {
        return $this->orderBy('listing_cost', 'asc')->first();
>>>>>>> ea76de248bf9f93f1c86307a16a7d9428c5653e4
    }
}
