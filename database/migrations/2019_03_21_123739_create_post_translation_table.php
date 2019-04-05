<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_title',800)->nullable();
            $table->string('meta_description',800)->nullable();
            $table->string('og_title',800)->nullable();
            $table->string('og_description',800)->nullable();
            $table->string('title',800)->nullable();
            $table->longText('description')->nullable();
            $table->string('slug',800)->nullable();
            $table->string('locale');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')->on('post')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_translation');
    }
}
