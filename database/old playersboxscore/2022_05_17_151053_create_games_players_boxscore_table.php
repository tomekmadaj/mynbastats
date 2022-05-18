<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesPlayersBoxscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_players_boxscore', function (Blueprint $table) {
            $table->id();
            $table->string('gameId', 20);
            $table->date('date');
            $table->string('personId', 20);
            $table->string('teamId', 20)->nullable();
            $table->string('firstName', 20)->nullable();
            $table->string('lastName', 20)->nullable();
            $table->string('jersey', 10)->nullable();
            $table->string('pos', 10)->nullable();
            $table->integer('points')->nullable();
            $table->string('min', 10)->nullable();
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

            $table->foreign('teamId')->references('teamId')->on('teams');
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
        Schema::dropIfExists('games_players_boxscore');
    }
}
