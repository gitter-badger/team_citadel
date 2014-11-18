<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Add title, first name, last name, home telephone to users table
		Schema::table('users', function($table) {
			$table->string('title');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('home_telephone');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop title, first name, last name, home telephone from users table
		Schema::table('user', function($table) {
			$table->dropColumn('title');
			$table->dropColumn('first_name');
			$table->dropColumn('last_name');
			$table->dropColumn('home_telephone');
		});
	}

}
