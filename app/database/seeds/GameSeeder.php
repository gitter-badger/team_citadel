<?php

class GameSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'games';
        $this->filename = app_path().'/database/csv/Card_Games.csv';
    }
}
