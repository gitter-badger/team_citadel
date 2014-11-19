<?php

class Listing extends Eloquent
{
    protected $table = 'listings';
    protected $guard = ['id', 'user_id'];
    protected $fillable = [
        'postage_cost',
        'post_from',
        'post_to',
        'dispatch_date',
        'returns',
        'listing_cost',
        'quantity',
        'condition'
    ];
}
