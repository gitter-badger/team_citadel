<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('attribute_card');

		Schema::create('attribute_card', function($table) {
		    $table->increments('id');
		    $table->integer('card_id');
		    $table->integer('attribute_id');
		    $table->string('value');
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
		Schema::dropIfExists('attribute_card');

		Schema::create('attribute_card', function($table) {
		    $table->increments('id');
		    $table->integer('card_id');
		    $table->integer('attribute_id');
		    $table->string('value');
		});
	}

}
