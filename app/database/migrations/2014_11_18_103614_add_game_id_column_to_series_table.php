<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameIdColumnToSeriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('series', function ($table) {
            $table->integer('game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // check the series table has
        if (Schema::hasColumn('series', 'game_id')) {
            // drop the game_id column
            Schema::table('series', function ($table) {
                $table->dropColumn('game_id');
            });
        }
    }
}
