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
    {   $gameName = Str::slug($this->series->game->name);
        $seriesName = Str::slug($this->series->name);
        return URL::route('aCard.show', [$gameName, $seriesName, $this->id, Str::slug($this->name)]);
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

    public function getLargeImageURL()
    {
        switch ($this->series->game_id) {
            case 1: // Weiss Schwarz
                if (file_exists(public_path() . '/images/cards/large/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg')) {
                    return '/images/cards/large/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg';
                } else {
                    return '/images/cards/small/'. $this->series->game->id . '-' . 'back.jpg';
                }

            case 2: // mtg
                return 'http://mtgimage.com/set/' . $this->serial_number . '/' . $this->name . '.jpg';
        }

    }

    public function getMediumImageURL()
    {
        switch ($this->series->game_id) {
            case 1: // Weiss Schwarz
                if (file_exists(public_path() . '/images/cards/medium/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg')) {
                    return '/images/cards/medium/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg';
                } else {
                    return '/images/cards/medium/'. $this->series->game->id . '-' . 'back.jpg';
                }

            case 2: // mtg
                return 'http://mtgimage.com/set/' . $this->serial_number . '/' . $this->name . '.jpg';

        }
    }

    public function getSmallImageURL()
    {
        switch ($this->series->game_id) {
            case 1: // Weiss Schwarz
                if (file_exists(public_path() . '/images/cards/small/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg')) {
                    return '/images/cards/small/'. str_replace('/', '-', $this->serial_number) . '-' . $this->rarity . '.jpg';
                } else {
                    return '/images/cards/small/'. $this->series->game->id . '-' . 'back.jpg';
                }

            case 2: // mtg
                return 'http://mtgimage.com/set/' . $this->serial_number . '/' . $this->name . '.jpg';

        }
    }
}
