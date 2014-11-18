<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// creates the attributes table
		Schema::create('attributes', function($table) {
		    $table->increments('id');
		    $table->string('name');
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
		// drops the attributes table
		Schema::dropIfExists('attributes');
	}

}
