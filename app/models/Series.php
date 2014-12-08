<?php

class Series extends Eloquent
{
    protected $table = 'series';
    protected $guarded = [
        'id'
    ];

    public function game()
    {
        return $this->belongsTo('Game');
    }

    public function cards()
    {
        return $this->hasMany('Card');
    }

    public function getUrlAttribute()
    {
        $gameName = str_replace(' ', '', $this->game->name);
        $seriesName = str_replace(' ', '', $this->name);
        return URL::route('set.show', [$gameName, $this->id]);
    }
}
