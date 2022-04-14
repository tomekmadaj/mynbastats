<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->string('teamId', 100);
            $table->string('conference', 100)->nullable();
            $table->integer('win')->nullable();
            $table->integer('loss')->nullable();
            $table->string('winPct', 100)->nullable();
            $table->string('winPctV2', 100)->nullable();
            $table->string('lossPct', 100)->nullable();
            $table->string('lossPctV2', 100)->nullable();
            $table->string('gamesBehind', 100)->nullable();
            $table->string('divGamesBehind', 100)->nullable();
            $table->string('clinchedPlayoffsCode', 100)->nullable();
            $table->string('clinchedPlayoffsCodeV2', 100)->nullable();
            $table->integer('confRank')->nullable();
            $table->integer('confWin')->nullable();
            $table->integer('confLoss')->nullable();
            $table->integer('divWin')->nullable();
            $table->integer('divLoss')->nullable();
            $table->integer('homeWin')->nullable();
            $table->integer('homeLoss')->nullable();
            $table->integer('awayWin')->nullable();
            $table->integer('awayLoss')->nullable();
            $table->integer('lastTenWin')->nullable();
            $table->integer('lastTenLoss')->nullable();
            $table->integer('streak')->nullable();
            $table->integer('divRank')->nullable();
            $table->boolean('isWinStreak')->nullable();
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
        Schema::dropIfExists('standings');
    }
}
