<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRatingFromEnumToTinyint extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		DB::statement('ALTER TABLE ratings MODIFY COLUMN value TINYINT');

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
		    DB::statement('ALTER TABLE ratings MODIFY COLUMN value ENUM("0", "1", "2", "3", "4", "5")');
		});
	}

}
