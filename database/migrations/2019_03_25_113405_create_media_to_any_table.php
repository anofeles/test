<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaToAnyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_to_any', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media_uuid');
            $table->string('row_uuid');
            $table->string('type')->nullable();
            $table->string('is_main')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_to_any');
    }
}
