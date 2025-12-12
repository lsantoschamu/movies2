<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;

    protected $table = 'titulaciones';

    protected $fillable = [
        'no_de_control', 
        'periodo',
        'opcion_titulacion',
        'fecha_solicitud_titulacion',
        'nombre_documento_sustento',
        'estatus_titulacion',
        'jurado_presidente',
        'jurado_secretario',
        'jurado_vocal',
        'jurado_suplente',
        'fecha_titulaciones',
        'cedula_profecional',
        'numero_libro_tit',
        'numero_cons_tit',
        'numero_foja_tit',
        'hora_inicio_recepcion',
        'hora_final_recepcion',
        'observaciones',
        'numero_libro_ac',
        'numero_foja_ac',
        'tema',
        'fecha_expedicion_titulo',
        'numero_titulo',
        'fecha_recepcion_dgest',
        'fecha_registro_tit',
        'periodo_ingreso_prepa',
        'periodo_egresa_prepa',
        'titulo_entrega',
        'clave',
        'antecedentes',
        'tipo_cedula',
        'tipo_registro',
        'fecha_registro_d_ac',
        'opcion_titulacion_letra',
        'pais',
    ];

    protected $casts = [
        'fecha_solicitud_titulacion' => 'date',
        'fecha_titulaciones' => 'date',
        'fecha_expedicion_titulo'  => 'date',
        'fecha_recepcion_dgest' => 'date',
        'fecha_registro_tit' => 'date',
        'fecha_registro_d_ac' =>'date',
    ];

}