<?php

class CardSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'cards';
        $this->filename = app_path().'/database/csv/All_Cards.csv';
    }
}
