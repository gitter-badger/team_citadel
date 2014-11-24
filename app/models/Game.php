<?php

class Game extends Eloquent
{
    protected $table = 'games';
    protected $guard = 'id';

    public function series()
    {
        return $this->hasMany('Series');
    }

    public function cards()
    {
        return $this->hasManyThrough('Series', 'Card');
    }
}
