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
        Schema::create('balade_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('balade_id');
            $table->string('image');
            // Foreign key with balades table
            $table->foreign('balade_id')->references('id')->on('balades')->onDelete('cascade');
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
        Schema::dropIfExists('balade_images');
    }
};
