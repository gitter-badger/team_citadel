<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCardsTableEngine extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update(DB::raw('ALTER TABLE cards ENGINE = MYISAM'));
        DB::statement('ALTER TABLE cards ADD FULLTEXT search(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP INDEX search ON cards');
        DB::update(DB::raw('ALTER TABLE cards ENGINE = InnoDB'));
    }
}
