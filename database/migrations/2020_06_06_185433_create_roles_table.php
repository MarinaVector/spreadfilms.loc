<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('company_role_id');


            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('company_role_id')->references('id')->on('company_roles')->onDelete('cascade');

            $table->primary(['company_id','company_role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
