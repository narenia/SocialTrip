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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->unsignedBigInteger('transporte_id');
            $table->unsignedBigInteger('estados_viaje_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('ciudad_salida_id')->nullable();
            $table->unsignedBigInteger('ciudad_destino_id');
            $table->integer('recomendado')->nullable();
            $table->foreign('transporte_id')->references('id')->on('transportes')->onDelete('cascade');
            $table->foreign('estados_viaje_id')->references('id')->on('estados_viaje')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('ciudad_salida_id')->references('id')->on('ciudades')->onDelete('set null');
            $table->foreign('ciudad_destino_id')->references('id')->on('ciudades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
};
