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
        // Schema::connection('mysql')->create('games', function (Blueprint $table) {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('descripton')->nullable();
            $table->string('publiesher', 100)->comment('game publisher');
            $table->float('score')->nullable();
            $table->timestamps();
        });

        //Schema::rename('from', 'to');
        //Shcema::hasTable('games') - sprawdzenie czy dana tabela istnieje
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
