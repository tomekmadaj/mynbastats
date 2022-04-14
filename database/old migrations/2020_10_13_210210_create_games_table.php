<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::connection('mysql')->create('games', function (Blueprint $table) {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('publisher', 100)->comment('game publisher');
            $table->float('score')->nullable();
            $table->timestamps();
        });

        //Schema::rename('from', 'to');
        //if (Schema::hasTable('games')) {
            // ....
        //}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
        //Schema::drop('games');
    }
}
