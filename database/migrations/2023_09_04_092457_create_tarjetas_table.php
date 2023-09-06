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
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->string('dni')->nullable(false);
            $table->integer('icc')->nullable(false);
            $table->integer('telefono')->nullable(false);
            $table->integer('extension')->nullable(false);
            $table->integer('pin')->nullable(false);
            $table->integer('puk')->nullable(false);
            $table->string('tipo_contrato')->nullable(false);
            $table->string('servicios_adicionales')->nullable(false);
            $table->timestamp('fecha_recogida')->nullable(false);
            $table->timestamp('fecha_alta')->nullable(false);
            $table->enum('estado',['Alta','Baja'])->nullable(false);
            $table->string('foto_sim')->nullable(true);
            $table->string('foto_firma')->nullable(true);
            $table->string('departamento')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjetas');
    }
};
