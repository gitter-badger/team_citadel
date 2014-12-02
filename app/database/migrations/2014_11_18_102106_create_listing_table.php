<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creates the listing table
        Schema::create('listings', function ($table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->integer('user_id');
            $table->integer('buyer_id');
            $table->integer('postage_cost');
            $table->string('post_from');
            $table->string('post_to');
            $table->date('dispatch_date');
            $table->boolean('returns');
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
        // drops the listing table
        Schema::dropIfExists('listings');
    }
}
