<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->foreignId('role_id')->nullable()->constrained();
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
            $table->dropForeign('users_company_id_foreign');
            $table->dropForeign('users_role_id_foreign');
        });

        Schema::dropIfExists('users');
    }
}
