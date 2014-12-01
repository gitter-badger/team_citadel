<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the user's address table
        Schema::create('address', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('line_1');
            $table->string('line_2');
            $table->string('line_3');
            $table->string('zip_post_code');
            $table->string('state_county');
            $table->string('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the user's address table
        Schema::dropIfExists('address');
    }
}
