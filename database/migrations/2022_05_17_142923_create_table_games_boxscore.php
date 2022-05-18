<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGamesBoxscore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_boxscore', function (Blueprint $table) {
            $table->id();
            $table->string('gameId', 20);
            $table->date('date');
            $table->string('hTeamId', 20)->nullable();
            $table->integer('hTeamScore')->nullable();
            $table->string('vTeamId', 20)->nullable();
            $table->integer('vTeamScore')->nullable();
            $table->integer('fastBreakPoints')->nullable();
            $table->integer('pointsInPaint')->nullable();
            $table->integer('biggestLead')->nullable();
            $table->integer('secondChancePoints')->nullable();
            $table->integer('pointsOffTurnovers')->nullable();
            $table->integer('longestRun')->nullable();
            $table->integer('points')->nullable();
            $table->integer('fgm')->nullable();
            $table->integer('fga')->nullable();
            $table->double('fgp')->nullable();
            $table->integer('ftm')->nullable();
            $table->integer('fta')->nullable();
            $table->double('ftp')->nullable();
            $table->integer('tpm')->nullable();
            $table->integer('tpa')->nullable();
            $table->double('tpp')->nullable();
            $table->integer('offReb')->nullable();
            $table->integer('defReb')->nullable();
            $table->integer('totReb')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('pFouls')->nullable();
            $table->integer('steals')->nullable();
            $table->integer('turnovers')->nullable();
            $table->integer('blocks')->nullable();
            $table->string('plusMinus', 20)->nullable();
            $table->string('min', 20)->nullable();
            $table->integer('team_fouls')->nullable();

            $table->foreign('hTeamId')->references('teamId')->on('teams');
            $table->foreign('vTeamId')->references('teamId')->on('teams');
            $table->foreign('gameId')->references('gameId')->on('schedule');

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
        Schema::dropIfExists('table_games_boxscore');
    }
}
