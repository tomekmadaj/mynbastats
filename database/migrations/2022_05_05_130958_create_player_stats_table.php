<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->string('personId', 100);
            $table->string('teamId', 100)->nullable();
            $table->string('seasonYear', 100)->nullable();
            $table->double('ppg')->nullable();
            $table->double('rpg')->nullable();
            $table->double('apg')->nullable();
            $table->double('mpg')->nullable();
            $table->double('topg')->nullable();
            $table->double('spg')->nullable();
            $table->double('bpg')->nullable();
            $table->double('tpp')->nullable();
            $table->double('ftp')->nullable();
            $table->double('fgp')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('blocks')->nullable();
            $table->integer('steals')->nullable();
            $table->integer('turnovers')->nullable();
            $table->integer('offReb')->nullable();
            $table->integer('defReb')->nullable();
            $table->integer('totReb')->nullable();
            $table->integer('fgm')->nullable();
            $table->integer('fga')->nullable();
            $table->integer('tpm')->nullable();
            $table->integer('tpa')->nullable();
            $table->integer('ftm')->nullable();
            $table->integer('fta')->nullable();
            $table->integer('pFouls')->nullable();
            $table->integer('points')->nullable();
            $table->integer('gamesPlayed')->nullable();
            $table->integer('gamesStarted')->nullable();
            $table->integer('plusMinus')->nullable();
            $table->integer('min')->nullable();
            $table->integer('dd2')->nullable();
            $table->integer('td3')->nullable();
            $table->timestamps();

            $table->primary('personId')->references('personId')->on('players');
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
        Schema::dropIfExists('player_stats');
    }
}
