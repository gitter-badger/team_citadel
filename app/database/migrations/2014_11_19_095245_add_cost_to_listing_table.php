<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostToListingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// add price to buy to listings
		Schema::table('listings', function($table) 
		{
			$table->integer('listing_cost');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// remove price to buy to listings
		Schema::table('listings', function($table)
		{
		    $table->dropColumn('listing_cost');
		});
	}

}
