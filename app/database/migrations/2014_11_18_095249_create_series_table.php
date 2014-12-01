<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// creates the series table
		Schema::create('series', function($table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->date('release_date');
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
		// drops the series table
		Schema::dropIfExists('series');
	}

}
