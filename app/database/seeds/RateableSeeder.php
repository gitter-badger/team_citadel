<?php

class RateableSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'rateables';
        $this->filename = app_path().'/database/csv/Rateables.csv';
    }
}