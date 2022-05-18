<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChagePrimaryKeyOnSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule', function (Blueprint $table) {
            $table->integer('id')->unsigned()->change();
            $table->dropPrimary('id');
            $table->primary('gameId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule', function (Blueprint $table) {
            $table->string('gameId')->unsigned()->change();
            $table->dropPrimary('gameId');
            $table->primary('id');
        });
    }
}
