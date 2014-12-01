<?php

class SeriesSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'series';
        $this->filename = app_path().'/database/csv/Card_Series.csv';
    }
}
