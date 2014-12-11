<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDeckUserPivotAndPutUserIdInDecksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// remove pivot
		Schema::drop('deck_user');

		// move user_id into deck table
		Schema::table('decks', function ($table) {
			$table->integer('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// recreate the pivot
		Schema::create('deck_user', function ($table) {
            $table->biginteger('deck_id');
            $table->biginteger('user_id');
        });

        // remove user_id from deck table
        Schema::table('decks', function ($table) {
            $table->dropColumn('user_id');
        });
	}

}
