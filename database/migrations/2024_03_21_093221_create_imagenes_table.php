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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('posts_id')->nullable();
            $table->unsignedBigInteger('viajes_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albumes')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('viajes_id')->references('id')->on('viajes')->onDelete('cascade');
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
        Schema::dropIfExists('imagenes');
    }
};
