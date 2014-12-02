<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToRatingsAndRateables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('ratings', function ($table) {
			$table->timestamps();
		});

		Schema::table('rateables', function ($table) {
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
		//
		Schema::table('ratings', function ($table) {
		    $table->dropColumn('created_at');
		    $table->dropColumn('updated_at');
		});

		Schema::table('rateables', function ($table) {
		    $table->dropColumn('created_at');
		    $table->dropColumn('updated_at');
		});
	}
}