<?php

class Attribute extends Eloquent
{
    protected $table = 'attributes';
    protected $guarded = [
        'id'
    ];

    public function cards()
    {
        return $this->belongsToMany('Card')->withPivot('value');
    }
}
