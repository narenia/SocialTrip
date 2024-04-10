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
        Schema::create('amistades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario1_id');
            $table->unsignedBigInteger('usuario2_id');
            $table->string('estado',45);
            $table->foreign('usuario1_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('usuario2_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('amistad');
    }
};
