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
        $gameName = strtolower(Str::slug($this->game->name));
        $seriesName = strtolower(Str::slug($this->name));
        return URL::route('set.show', [$gameName, $this->id, $seriesName]);
    }

    public function getLargeImageURL()
    {
        return 'images/series/large/'. $this->id . '.jpg';
    }

    public function getSmallImageURL()
    {
        return 'images/series/small/'. $this->id . '.jpg';
    }
}
