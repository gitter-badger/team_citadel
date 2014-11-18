<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributsCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the attributes card pivot table
		Schema::create('attribute_card', function($table) {
		    $table->integer('attribute_id');
		    $table->integer('card_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop the attribute card pivot table
		Schema::dropIfExists('attribute_card');
	}

}
