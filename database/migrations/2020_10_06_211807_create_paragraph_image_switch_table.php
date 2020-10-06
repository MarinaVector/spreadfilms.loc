<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParagraphImageSwitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraph_image_switch', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paragraph_id')->references('id')->on('paragraphs');
            $table->text('header')->nullable();
            $table->text('text')->nullable();
            $table->text('textbefore')->nullable();
            $table->text('textafter')->nullable();
            $table->text('imagebefore')->nullable();
            $table->text('imageafter')->nullable();
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
        Schema::dropIfExists('paragraph_image_switch');
    }
}
