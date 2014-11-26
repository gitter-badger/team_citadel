<?php 

class AttributeCardSeeder extends BaseSeeder
{
    public function __Construct()
    {
        $this->table = 'attribute_card';
        $this->filename = app_path().'/database/csv/Attribute_Card.csv';
    }
}