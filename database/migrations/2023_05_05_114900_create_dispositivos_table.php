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
        Schema::create('dispositivos', function (Blueprint $table) {

            $table->id()->autoIncrement();
            $table->string('nombre_dispositivo')->unique()->nullable(false);
            $table->string('numero_serie')->nullable(true);
            $table->string('tipo_dispositivo')->nullable(false);
            $table->string('conexion')->nullable(false);
            $table->string('zona_trabajo')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};