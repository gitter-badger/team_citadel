<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablesEnginesAndIndex extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add Full text searching to series
        DB::update(DB::raw('ALTER TABLE series ENGINE = MYISAM'));
        DB::statement('ALTER TABLE series ADD FULLTEXT search(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP INDEX search ON series');
        DB::update(DB::raw('ALTER TABLE series ENGINE = MYISAM'));
    }
}
