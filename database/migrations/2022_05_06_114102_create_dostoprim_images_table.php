<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDostoprimImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dostoprim_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dostoprim_id')->constrained()->onDelete('cascade');
            $table->string('dostoprim_img');
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
        Schema::dropIfExists('dostoprim_images');
    }
}
