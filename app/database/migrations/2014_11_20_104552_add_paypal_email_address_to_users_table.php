<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaypalEmailAddressToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// add the paypal email address
		Schema::table('users', function ($table) {
			$table->string('paypal_email_address');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// remove the paypal email address column
		Schema::table('users', function ($table) {
			$table->dropColumn('paypal_email_address');
		});
	}

}
