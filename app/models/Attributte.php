<?php

class Attribute extends Eloquent
{
    protected $table = 'attributes';
    protected $guard = 'id';

    public function cards()
    {
        return $this->belongsToMany('Card')->withPivot('value');
    }
}
