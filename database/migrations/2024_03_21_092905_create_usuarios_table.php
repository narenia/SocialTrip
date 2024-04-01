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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email', 60)->unique();
            $table->string('contrasenna', 20);
            $table->smallInteger('tipo')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('nombre',25);
            $table->string('apellidos',60);
            $table->string('nombre_usuario',45)->unique();
            $table->string('dni',9)->nullable()->unique();
            $table->unsignedBigInteger('ciudad_residencia');
            $table->unsignedBigInteger('ciudad_nacimiento');
            $table->foreign('ciudad_residencia')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('ciudad_nacimiento')->references('id')->on('ciudades')->onDelete('cascade');
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
        Schema::dropIfExists('usuarios');
    }
};