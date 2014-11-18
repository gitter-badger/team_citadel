<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the listing item table
		Schema::create('listing_items', function($table) {
		    $table->increments('id');
		    $table->integer('listing_id');
		    $table->integer('card_id');
		    $table->integer('quantity');
		    $table->string('condition');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop the listing item table
		Schema::dropIfExists('listing_items');

	}

}