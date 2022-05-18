<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_leaders', function (Blueprint $table) {
            $table->id();
            $table->string('gameId', 20);
            $table->date('date');
            $table->string('teamId', 20);
            $table->integer('points')->nullable();
            $table->string('pPersonId', 20)->nullable();
            $table->string('pFirstName', 20)->nullable();
            $table->string('pLastName', 20)->nullable();
            $table->integer('rebounds')->nullable();
            $table->string('rPersonId', 20)->nullable();
            $table->string('rFirstName', 20)->nullable();
            $table->string('rLastName', 20)->nullable();
            $table->integer('assists')->nullable();
            $table->string('aPersonId', 20)->nullable();
            $table->string('aFirstName', 20)->nullable();
            $table->string('aLastName', 20)->nullable();

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
        Schema::dropIfExists('games_leaders');
    }
}
