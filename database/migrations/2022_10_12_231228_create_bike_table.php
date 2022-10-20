<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('color');
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->string('size');
            $table->string('price');
            $table->string('description');
            $table->timestamps();

            // foreign key on images table
            $table->unsignedBigInteger('images_id');
            $table->foreign('images_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bike');
    }
};
