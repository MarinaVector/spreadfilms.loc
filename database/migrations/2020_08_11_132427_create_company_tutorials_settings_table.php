<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTutorialsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_tutorials_settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme')->nullable();
            $table->string('logo')->nullable();
            $table->string('startscreen_title')->nullable();
            $table->string('startscreen_button_text')->nullable();
            $table->string('main_page_background')->nullable();
            $table->string('chapter_complete')->nullable();
            $table->string('email_notifications_to');
            $table->integer('company_id');
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
        Schema::dropIfExists('company_tutorials_settings');
    }
}
