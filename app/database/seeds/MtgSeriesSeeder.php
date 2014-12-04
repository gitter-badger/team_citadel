<?php
// Do not run this unless you ask me first
class MtgSeriesSeeder extends Seeder {

    function run() {

        $name = '';
        $release_date = '';
        $serial_number ='';
        $game_id = '2';
        $series_id = 104;

        if(($handle = fopen("./app/database/json/AllSetsArray.json", "r")) !== FALSE) {

            $json = file_get_contents("./app/database/json/AllSetsArray.json");
            $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)),RecursiveIteratorIterator::SELF_FIRST);

            $seriesList = [];

            foreach ($jsonIterator as $key => $val) {

                switch ($key) {
                    case 'name':
                        $name = $val;
                        break;
                    case 'releaseDate':
                        $release_date = $val;
                        break;
                    case 'code':
                        $serial_number = $val;
                        break;
                }

                if ($name != '' && $release_date != '' && $serial_number != '') {

                    $seriesArray = [(string) $series_id++, (string) $name, (string) $release_date, (string) $serial_number, (string) $game_id];
                    
                    $seriesList[] = $seriesArray;

                    $name = '';
                    $release_date ='';
                    $serial_number = '';
                }
            }

            $fp = fopen('./app/database/csv/Card_Series.csv', 'w');

            foreach ($seriesList as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
        }
    }   
}