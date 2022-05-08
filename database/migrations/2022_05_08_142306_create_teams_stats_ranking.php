<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsStatsRanking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_stats_rankings', function (Blueprint $table) {
            $table->id();
            $table->string('teamId', 100);
            $table->string('name', 100)->nullable();
            $table->string('teamcode', 100)->nullable();
            $table->string('abbreviation', 100)->nullable();
            $table->double('min_avg')->nullable();
            $table->integer('min_rank')->nullable();
            $table->double('fgp_avg')->nullable();
            $table->integer('fgp_rank')->nullable();
            $table->double('tpp_avg')->nullable();
            $table->integer('tpp_rank')->nullable();
            $table->double('ftp_avg')->nullable();
            $table->integer('ftp_rank')->nullable();
            $table->double('orpg_avg')->nullable();
            $table->integer('orpg_rank')->nullable();
            $table->double('drpg_avg')->nullable();
            $table->integer('drpg_rank')->nullable();
            $table->double('trpg_avg')->nullable();
            $table->integer('trpg_rank')->nullable();
            $table->double('apg_avg')->nullable();
            $table->integer('apg_rank')->nullable();
            $table->double('tpg_avg')->nullable();
            $table->integer('tpg_rank')->nullable();
            $table->double('spg_avg')->nullable();
            $table->integer('spg_rank')->nullable();
            $table->double('bpg_avg')->nullable();
            $table->integer('bpg_rank')->nullable();
            $table->double('pfpg_avg')->nullable();
            $table->integer('pfpg_rank')->nullable();
            $table->double('ppg_avg')->nullable();
            $table->integer('ppg_rank')->nullable();
            $table->double('oppg_avg')->nullable();
            $table->integer('oppg_rank')->nullable();
            $table->string('eff_avg')->nullable();
            $table->integer('eff_rank')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('teams_stats_ranking');
    }
}
