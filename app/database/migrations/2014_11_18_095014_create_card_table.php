<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creates the card table
        Schema::create('cards', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('series_id');
            $table->string('serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drops the cards table
        Schema::dropIfExists('cards');
    }
}
