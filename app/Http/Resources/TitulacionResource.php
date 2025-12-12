<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TitulacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no_de_control' => $this->no_de_control,
            'periodo' => $this->periodo,
            'opcion_titulacion' => $this->opcion_titulacion,
            'fecha_solicitud_titulacion' => $this->fecha_solicitud_titulacion,
            'nombre_documento_sustento' => $this->nombre_documento_sustento,
            'estatus_titulacion' => $this->estatus_titulacion,
            'jurado_presidente' => $this->jurado_presidente,
            'jurado_secretario' => $this->jurado_secretario,
            'jurado_vocal' => $this->jurado_vocal,
            'jurado_suplente' => $this->jurado_suplente,
            'fecha_titulaciones' => $this->fecha_titulaciones,
            'cedula_profecional' => $this->cedula_profecional,
            'numero_libro_tit' => $this->numero_libro_tit,
            'numero_cons_tit' => $this->numero_cons_tit,
            'numero_foja_tit' => $this->numero_foja_tit,
            'hora_inicio_recepcion' => $this->hora_inicio_recepcion,
            'hora_final_recepcion' => $this->hora_final_recepcion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
