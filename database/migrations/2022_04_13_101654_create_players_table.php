<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('personId', 100);
            $table->string('teamId', 100)->nullable();
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 100)->nullable();
            $table->string('temporaryDisplayName', 100)->nullable();
            $table->string('jersey', 100)->nullable();
            $table->boolean('isActive')->nullable();
            $table->string('pos', 10)->nullable();
            $table->double('heightFeet')->nullable();
            $table->double('heightInches')->nullable();
            $table->double('heightMeters')->nullable();
            $table->double('weightPounds')->nullable();
            $table->double('weightKilograms')->nullable();
            $table->date('dateOfBirthUTC')->nullable();
            $table->string('nbaDebutYear')->nullable();
            $table->integer('yearsPro')->nullable();
            $table->string('collegeName')->nullable();
            $table->string('lastAffiliation')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('players');
    }
}
