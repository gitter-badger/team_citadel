<?php

class Card extends Eloquent
{
    protected $table = 'cards';
    protected $guarded = [
        'id'
    ];

    public function series()
    {
        return $this->belongsTo('Series');
    }

    public function attributes()
    {
        return $this->belongsToMany('Attribute')->withPivot('value');
    }

    public function listings()
    {
        return $this->hasMany('Listing');
    }

    public function getUrlAttribute()
    {   $gameName = str_replace(' ', '', $this->series->game->name);
        $seriesName = str_replace(' ', '', $this->series->name);
        return URL::route('aCard.show', [$gameName, $seriesName, $this->id]);
    }
    
    public function decks()
    {
        return $this->belongsToMany('Deck');
    }
}
