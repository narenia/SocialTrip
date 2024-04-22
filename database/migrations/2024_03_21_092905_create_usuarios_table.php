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
            $table->string('contrasenna', 50);
            $table->smallInteger('tipo')->nullable()->default(null);
            $table->date('fecha_nacimiento')->nullable()->default(null);
            $table->string('nombre',25)->nullable()->default(null);
            $table->string('apellidos',60)->nullable()->default(null);
            $table->string('nombre_usuario',45)->unique();
            $table->string('dni',9)->nullable()->unique()->default(null);
            $table->unsignedBigInteger('ciudad_residencia')->nullable()->default(null);
            $table->unsignedBigInteger('ciudad_nacimiento')->nullable()->default(null);
            $table->foreign('ciudad_residencia')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('ciudad_nacimiento')->references('id')->on('ciudades')->onDelete('cascade');
            $table->rememberToken();
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
