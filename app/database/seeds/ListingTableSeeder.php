<?php

class ListingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('listings')->delete();

        Listing::create(array('email' => 'foo@bar.com'));
    }

}