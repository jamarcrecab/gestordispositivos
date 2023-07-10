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
        Schema::create('impresoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_dipositivo')->unique()->nullable(false);
            $table->int('ip_principal')->nullable(false);
            $table->int('ip_secundaria')->nullable(true);
            $table->enum('cabildo',['Si','No'])->nullable(false);
            $table->text('observaciones')->nullable(true);
            $table->timestamps();

            $table->foreign('nombre_dispositivo')->references('nombre_dispositivo')->on('dispositivos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impresoras');
    }
};
