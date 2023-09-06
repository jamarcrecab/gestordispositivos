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
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_dispositivo')->unique()->nullable(false);
            $table->unsignedBigInteger('id_dispositivo');
            $table->string('marca')->nullable(false);
            $table->string('modelo')->nullable(false);
            $table->string('usuario_principal')->nullable(false);
            $table->integer('numero_telefono')->nullable(false);
            $table->string('departamento')->nullable(false);
            $table->string('correo')->nullable(true);
            $table->text('observaciones')->nullable(true);
            $table->timestamps();

            $table->foreign('nombre_dispositivo')->references('nombre_dispositivo')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_dispositivo')->references('id')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos');
    }
};
