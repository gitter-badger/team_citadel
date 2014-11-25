<?php

class Item extends Eloquent
{
    protected $table = 'listing_items';
    protected $guard = ['id', 'lisiting_id'];
    protected $fillable = [
        'card_id',
        'quantity',
        'condition'
    ];

    function items() {
        return $this->belongsTo('Listing');
    }
}
