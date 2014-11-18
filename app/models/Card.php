<?php

namespace model\cards;

class Card extends Eloquent
{
    protected $table = 'cards';
    protected $guard = 'id';

    public function series()
    {
        return $this->belongsTo('Series');
    }
}
