<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersAndCommentsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function ($table) {
            $table->integer('user_id');
        }) ;

        Schema::table('users', function ($table) {
            $table->dropColumn(['mobile_phone', 'home_telephone', 'paypal_email_address']);
        });

        Schema::drop('addresses');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function ($table) {
            $table->dropColumn('user_id');
        });

        Schema::table('users', function ($table) {
            $table->string('mobile_phone');
            $table->string('home_telephone');
            $table->string('paypal_email_address');
        });

        Schema::create('addresses', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('line_1');
            $table->string('line_2');
            $table->string('line_3');
            $table->string('zip_post_code');
            $table->string('state_county');
            $table->string('country');
        });
    }
}
