<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CombineListingAndListingItem extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('listings', function ($table) {
			$table->integer('card_id');
			$table->integer('quantity');
			$table->string('condition');
		});

		Schema::drop('listing_items');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// 
		Schema::table('listings', function($table) {
			$table->dropColumn('card_id');
			$table->dropColumn('quantity');
			$table->dropColumn('condition');
		});

		Schema::create('listing_items', function ($table) {
		    $table->increments('id');
		    $table->integer('listing_id');
		    $table->integer('card_id');
		    $table->integer('quantity');
		    $table->string('condition');
		});
	}

}
