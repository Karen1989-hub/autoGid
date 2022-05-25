<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sights', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('time')->nullable();
            $table->string('complexity')->nullable();
            $table->string('type')->nullable();
            $table->string('distance')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('img')->nullable();            
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
        Schema::dropIfExists('sights');
    }
}
