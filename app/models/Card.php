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

    // A card will be rated on many things
    public function rateables() {
        return $this->belongsToMany('Rateable');
    }

    // Gets the average rating for that card.
    public function average() {
        $rateables = $this->series->game->rateables;
        $averageRatings = [];

        foreach ($rateables as $rateable) {
            $averageRatings[$rateable->name] = round(Rating::whereCardId($this->id)
                ->whereRateableId($rateable->id)
                ->avg('value'));
        }

        return json_encode($averageRatings);
    }
}
