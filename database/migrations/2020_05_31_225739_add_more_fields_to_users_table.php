<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('street')->nullable();
            $table->string('postcode')->nullable();
            $table->string('native_language')->nullable();
            $table->string('location')->nullable();
            $table->string('homepage')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('street');
            $table->dropColumn('postcode');
            $table->dropColumn('native_language');
            $table->dropColumn('location');
            $table->dropColumn('homepage');
            $table->dropColumn('country');
            $table->dropColumn('phone');
            $table->dropColumn('birth_year');
            $table->dropColumn('avatar');
        });
    }
}
