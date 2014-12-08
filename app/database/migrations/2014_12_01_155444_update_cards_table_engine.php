<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCardsTableEngine extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update(DB::raw('ALTER TABLE cards ENGINE = MYISAM'));
        DB::statement('ALTER TABLE cards ADD FULLTEXT search(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cards');
         // creates the card table
        Schema::create('cards', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('series_id');
            $table->string('rarity');
            $table->string('serial_number');
            $table->timestamps();
        });
    }
}
