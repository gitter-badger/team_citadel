<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateListingsWithStatus extends Migration {

    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('listings', function ($table) {
            $table->enum('sales_status', ['listed', 'staged', 'sold'])->default('listed');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('listings', function ($table) {
            $table->dropColumn('enum');
        });
    }
}