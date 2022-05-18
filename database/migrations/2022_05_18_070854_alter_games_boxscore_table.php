<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGamesBoxscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games_boxscore', function (Blueprint $table) {
            $table->dropForeign(['hTeamId']);
            $table->dropForeign(['vTeamId']);

            $table->dropColumn(['hTeamId', 'hTeamScore', 'vTeamId', 'vTeamScore']);
            $table->string('teamId', 20);
            $table->boolean('isHTeam')->nullable();

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
        Schema::table('games_boxscore', function (Blueprint $table) {
            $table->dropForeign(['teamId']);

            $table->string('hTeamId', 20)->nullable();
            $table->integer('hTeamScore')->nullable();
            $table->string('vTeamId', 20)->nullable();
            $table->integer('vTeamScore')->nullable();
            $table->dropColumn(['teamId', 'isHTeam']);

            $table->foreign('hTeamId')->references('teamId')->on('teams');
            $table->foreign('vTeamId')->references('teamId')->on('teams');
        });
    }
}
