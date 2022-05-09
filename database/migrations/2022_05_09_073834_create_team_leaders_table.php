<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_leaders', function (Blueprint $table) {
            $table->id();
            $table->string('teamId', 100);
            $table->double('ppg')->nullable();
            $table->double('ppg_personId')->nullable();
            $table->double('trpg')->nullable();
            $table->double('trpg_personId')->nullable();
            $table->double('apg')->nullable();
            $table->double('apg_personId')->nullable();
            $table->double('fgp')->nullable();
            $table->double('fgp_personId')->nullable();
            $table->double('tpp')->nullable();
            $table->double('tpp_personId')->nullable();
            $table->double('ftp')->nullable();
            $table->double('ftp_personId')->nullable();
            $table->double('bpg')->nullable();
            $table->double('bpg_personId')->nullable();
            $table->double('spg')->nullable();
            $table->double('spg_personId')->nullable();
            $table->double('tpg')->nullable();
            $table->double('tpg_personId')->nullable();
            $table->double('pfpg')->nullable();
            $table->double('pfpg_personId')->nullable();

            $table->foreign('teamId')->references('teamId')->on('teams');
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
        Schema::dropIfExists('team_leaders');
    }
}
