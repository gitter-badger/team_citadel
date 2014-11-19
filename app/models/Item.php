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

    public function listing() {
        return $this->belongsTo('Listing');
    }

    public function card() {
        return $this->belongsTo('Card');
    }
}
