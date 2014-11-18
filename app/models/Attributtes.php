<?php

namespace model\cards;

class Attributes extends Eloquent
{
    protected $table = 'attributes';
    protected $guard = 'id';

    public function cards()
    {
        return $this->belongsToMany('Card');
    }
}
