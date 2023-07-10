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
        Schema::create('ordenadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_dispositivo')->unique()->nullable(false);
            $table->string('ip1')->nullable(false);
            $table->string('ip2')->nullable(true);
            $table->string('procesador')->nullable(false);
            $table->string('so')->nullable(false);
            $table->integer('ram')->nullable(false);
            $table->string('programa_ofimatica')->nullable(false);
            $table->string('licencia_office')->nullable(true);
            $table->string('licencia_windows')->nullable(true);
            $table->string('correo_office')->nullable(true);
            $table->string('discoduro')->nullable(false);
            $table->string('departamento')->nullable(false);
            $table->string('usuario_principal')->nullable(false);
            $table->string('usuario_dominio')->nullable(true);
            $table->enum('cabildo',['Si','No'])->nullable(false);
            $table->timestamp('fecha_instalacion')->nullable(false);
            $table->string('tecnico_informatico')->nullable(false);
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
        Schema::dropIfExists('ordenadores');
    }
};
