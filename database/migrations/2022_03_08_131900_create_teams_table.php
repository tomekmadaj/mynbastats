<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('teamId', 100);
            $table->string('fullName', 100)->nullable();
            $table->string('nickname', 100)->nullable();
            $table->string('urlName', 100)->nullable();
            $table->string('altCityName', 100)->nullable();
            $table->string('teamShortName', 100)->nullable();
            $table->string('tricode', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('confName', 100)->nullable();
            $table->string('divName', 100)->nullable();
            $table->boolean('isAllStar');
            $table->boolean('isNBAFranchise');
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
        Schema::dropIfExists('teams');
    }
}
