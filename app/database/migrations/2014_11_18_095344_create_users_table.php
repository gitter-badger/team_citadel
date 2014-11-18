<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function( $table ) {
			$table->increments( 'id' );
			$table->string( 'username' );
			$table->string( 'password' );
			$table->string( 'access_level' );
			$table->string( 'email_address' );
			$table->string( 'mobile_phone' );
			$table->string( 'gender' );
			$table->date( 'date_of_birth' );
			$table->string( 'location' );
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
		Schema::dropIfExists( 'users' );
	}

}
