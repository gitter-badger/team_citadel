<?php
class MtgCardsSeeder extends Seeder 
{

    public function run() 
    {
        $name = '';
        $series_id ='';
        $serial_number = '';
        $rarity = '';

        if (($handle = fopen("./app/database/json/AllSetsArray.json", "r")) !== FALSE) {

            $json = file_get_contents("./app/database/json/AllSetsArray.json");

            $sets = json_decode($json, true);
            $game = Game::whereName('Magic The Gathering')->first();

            foreach ($sets as $set) {
                $seriesModel = $game
                    ->series()
                    ->where('name', '=', $set['name'])
                    ->first();

                if (!$seriesModel) {
                    $seriesModel = $game
                        ->series()
                        ->create(
                        [
                            'name'          => $set['name'],
                            'release_date'  => $set['releaseDate'],
                            'serial_number' => $set['code']
                        ]
                    );
                }

                foreach ($set['cards'] as $card) {
                    $cardModel = $seriesModel
                        ->cards()
                        ->create(
                        [
                            'name'          => $card['name'],
                            'serial_number' => $set['code'],
                            'rarity'        => $card['rarity']
                        ]
                    );
                    // Adding Text Addribute
                    if (array_key_exists('text', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '6',
                                'value' => $card['text']
                            ]
                        );
                    }
                    //  Adding Mana Cost Attribute
                    if (array_key_exists('manaCost', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '11',
                                'value' => $card['manaCost']
                            ]
                        );
                    }
                    // Adding Converted Mana Cost Attribute
                    if (array_key_exists('cmc', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '12',
                                'value' => $card['cmc']
                            ]
                        );
                    }
                    // Adding Type Attribute
                    if (array_key_exists('types', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '4',
                                'value' => json_encode($card['types'])
                            ]
                        );
                    }
                    // Adding Power Attribute
                    if (array_key_exists('power', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '10',
                                'value' => $card['power']
                            ]
                        );
                    }
                    // Adding Tougness Attribute
                    if (array_key_exists('toughness', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '15',
                                'value' => $card['toughness']
                            ]
                        );
                    }
                    // Adding Artist Attribute
                    if (array_key_exists('artist', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '14',
                                'value' => $card['artist']
                            ]
                        );
                    }
                    // Adding Flavour Attribute
                    if (array_key_exists('flavor', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '13',
                                'value' => $card['flavor']
                            ]
                        );
                    }
                    // Adding Loyalty Attribute
                    if (array_key_exists('loyalty', $card)) {
                        $cardModel
                            ->attributes()
                            ->save( $cardModel,
                            [
                                'attribute_id' => '16',
                                'value' => $card['loyalty']
                            ]
                        );
                    }
                }
            }
            fclose($handle);
        } else {
            return false;
        }
    }
}