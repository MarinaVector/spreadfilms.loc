<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParagraphVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraph_video', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paragraph_id')->references('id')->on('paragraphs');
            $table->string('banner')->nullable();
            $table->string('videoUrl')->nullable();
            $table->string('dimension')->nullable();
            $table->text('notices')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('paragraph_video');
    }
}
