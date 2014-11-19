<?php

class Card extends Eloquent
{
    protected $table = 'cards';
    protected $guard = 'id';

    public function series()
    {
        return $this->belongsTo('Series');
    }

    public function attributes()
    {
        return $this->belongsToMany('Attributes');
    }

    public function Items() {
        return $this->hasMany('Items');
    }
}
