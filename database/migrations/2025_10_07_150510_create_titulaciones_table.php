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
        Schema::create('titulaciones', function (Blueprint $table) {
            $table->id();  
            $table->string('periodo', 100);
            $table->string('no_de_control', 50);
            $table->string('opcion_titulacion', 255);
            $table->date('fecha_solicitud_titulacion')->nullable();
            $table->string('nombre_documento_sustento', 255);
            $table->string('estatus_titulacion', 100)->nullable();
            $table->string('jurado_presidente', 255)->nullable();
            $table->string('jurado_secretario', 255)->nullable();
            $table->string('jurado_vocal', 255)->nullable();
            $table->string('jurado_suplente', 255)->nullable();
            $table->date('fecha_titulaciones')->nullable();
            $table->string('cedula_profecional', 50)->nullable();
            $table->string('numero_libro_tit', 50)->nullable();
            $table->string('numero_cons_tit', 50)->nullable();
            $table->string('numero_foja_tit', 50)->nullable();
            $table->dateTime('hora_inicio_recepcion')->nullable();
            $table->dateTime('hora_final_recepcion')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('numero_libro_ac', 255)->nullable();
            $table->string('numero_foja_ac', 255)->nullable();
            $table->string('tema', 255)->nullable();
            $table->date('fecha_expedicion_titulo')->nullable();
            $table->string('numero_titulo', 255)->nullable();
            $table->date('fecha_recepcion_dgest')->nullable();
            $table->date('fecha_registro_tit')->nullable();
            $table->string('periodo_ingreso_prepa', 50)->nullable();
            $table->string('periodo_egresa_prepa', 50)->nullable();
            $table->string('titulo_entrega', 255)->nullable();
            $table->string('clave', 50)->nullable();
            $table->string('antecedentes', 100)->nullable();
            $table->string('tipo_cedula', 50)->nullable();
            $table->string('tipo_registro', 50)->nullable();
            $table->date('fecha_registro_d_ac')->nullable();
            $table->string('opcion_titulacion_letra', 10)->nullable();
            $table->string('pais', 100)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulaciones');
    }
};
