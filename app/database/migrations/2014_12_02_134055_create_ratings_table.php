<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('ratings', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('card_id');
			$table->integer('rateable_id');
			$table->enum('value', [0, 1, 2, 3, 4, 5]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists('ratings');
	}

}
