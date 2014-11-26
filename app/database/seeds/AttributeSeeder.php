<?php 

class AttributeSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'attributes';
        $this->filename = app_path().'/database/csv/Attributes.csv';
    }
}