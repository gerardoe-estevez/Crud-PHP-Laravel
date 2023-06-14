<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();

            $table->String('Nombre');
            $table->String('Apellido');
            $table->String('Cedula');
            $table->String('Telefono');
            $table->String('Correo');
            $table->String('Direccion');
            $table->String('Estado');
            $table->String('Municipio');
            $table->String('FechaDeNacimiento');
            $table->String('MateriasCursadas');
            $table->String('foto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
