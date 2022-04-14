<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirmaryAndForeignKeyToPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->integer('id')->unsigned()->change();
            $table->dropPrimary('id');
            $table->primary('personId');
            $table->foreign('teamId')->references('teamId')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('personId')->unsigned()->change();
            $table->dropPrimary('personId');
            $table->primary('id');
            $table->dropForeign('teamId');
        });
    }
}
