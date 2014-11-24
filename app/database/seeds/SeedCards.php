<?php

class SeedCards extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'cards';
        $this->filename = app_path().'/database/csv/WeissSchwarz_Cards.csv';
    }
}
