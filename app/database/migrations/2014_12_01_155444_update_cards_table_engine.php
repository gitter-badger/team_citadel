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
        Schema::drop('cards');

        Schema::create('cards', function ($table) {
            $table->engine = 'MYISAM';
            $table->bigincrements('id');
            $table->string('name');
            $table->string('rarity');
            $table->string('series_id');
            $table->string('serial_number');
            $table->timestamps();
        });

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
