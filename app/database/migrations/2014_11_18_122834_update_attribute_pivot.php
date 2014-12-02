<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAttributePivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('attribute_card', function($table)
		{
		    $table->string('value');
		});

		Schema::table('attributes', function($table)
		{
		    $table->dropColumn('value');
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
		Schema::table('attribute_card', function($table)
		{
		    $table->dropColumn('value');
		});

		Schema::table('attributes', function($table)
		{
		    $table->string('value');
		});
	}

}
