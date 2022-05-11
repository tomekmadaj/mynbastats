<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamIdAndPersonIdColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('teamId', 100)->default(null)->nullable();
            $table->string('personId', 100)->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'teamId') && Schema::hasColumn('users', 'personId')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('teamId');
                $table->dropColumn('personId');
            });
        }
    }
}
