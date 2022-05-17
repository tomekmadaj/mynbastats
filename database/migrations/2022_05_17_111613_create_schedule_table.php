<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string('gameId', 20);
            $table->date('date');
            $table->string('gameUrlCode', 100)->nullable();
            $table->string('startTimeEastern', 50)->nullable();
            $table->string('hTeamId', 20)->nullable();
            $table->integer('hTeamScore')->nullable();
            $table->string('vTeamId', 20)->nullable();
            $table->integer('vTeamScore')->nullable();

            $table->foreign('hTeamId')->references('teamId')->on('teams');
            $table->foreign('vTeamId')->references('teamId')->on('teams');

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
        Schema::dropIfExists('schedule');
    }
}
