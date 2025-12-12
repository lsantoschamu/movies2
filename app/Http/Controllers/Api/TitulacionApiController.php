<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Titulacion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TitulacionApiController extends Controller
{
    
    public function index(): JsonResponse
    {
        $aseguradoras = Titulacion::all();
        return response()->json($aseguradoras);
    }

    
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'no_de_control' => 'required|string|max:50',
            'periodo' => 'required|string|max:100',
            'opcion_titulacion' => 'required|string|max:255',
            'fecha_solicitud_titulacion' => 'required|date',
            'nombre_documento_sustento' => 'nullable|string|max:255',
            'estatus_titulacion' => 'required|string|max:100',
            'jurado_presidente' => 'nullable|string|max:255',
            'jurado_secretario' => 'nullable|string|max:255',
            'jurado_vocal' => 'nullable|string|max:255',
            'jurado_suplente' => 'nullable|string|max:255',
            'fecha_titulaciones' => 'nullable|date',
            'cedula_profecional' => 'nullable|string|max:50',
            'numero_libro_tit' => 'nullable|string|max:50',
            'numero_cons_tit' => 'nullable|string|max:50',
            'numero_foja_tit' => 'nullable|string|max:50',
            'hora_inicio_recepcion' => 'nullable',
            'hora_final_recepcion'  => 'nullable',
        ]);

        $aseguradora = Titulacion::create($request->all());
        return response()->json($aseguradora, 201);
    }

    
    public function show(string $id): JsonResponse
    {
        try {
            $aseguradora = Titulacion::findOrFail($id);
            return response()->json($aseguradora);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Aseguradora no encontrada'], 404);
        }
    }

    
    public function update(Request $request, string $id): JsonResponse
    {
        $validatedData = $request->validate([
            'no_de_control' => 'required|string|max:50',
            'periodo' => 'required|string|max:100',
            'opcion_titulacion' => 'required|string|max:255',
            'fecha_solicitud_titulacion' => 'required|date',
            'nombre_documento_sustento' => 'nullable|string|max:255',
            'estatus_titulacion' => 'required|string|max:100',
            'jurado_presidente' => 'nullable|string|max:255',
            'jurado_secretario' => 'nullable|string|max:255',
            'jurado_vocal' => 'nullable|string|max:255',
            'jurado_suplente' => 'nullable|string|max:255',
            'fecha_titulaciones' => 'nullable|date',
            'cedula_profecional' => 'nullable|string|max:50',
            'numero_libro_tit' => 'nullable|string|max:50',
            'numero_cons_tit' => 'nullable|string|max:50',
            'numero_foja_tit' => 'nullable|string|max:50',
            'hora_inicio_recepcion' => 'nullable',
            'hora_final_recepcion'  => 'nullable',
            'observaciones' => 'nullable|string',
            'numero_libro_ac' => 'required|string|max:255',
            'numero_foja_ac' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'fecha_expedicion_titulo' => 'required|date',
            'numero_titulo' => 'required|string|max:255|unique:titulaciones,numero_titulo',
            'fecha_recepcion_dgest' => 'nullable|date',
            'fecha_registro_tit' => 'nullable|date',
            'periodo_ingreso_prepa' => 'nullable|string|max:50',
            'periodo_egresa_prepa' => 'nullable|string|max:50',
            'titulo_entrega' => 'nullable|string|max:255',
            'clave' => 'nullable|string|max:50',
            'antecedentes' => 'nullable|string|max:100',
            'tipo_cedula' => 'nullable|string|max:50',
            'tipo_registro' => 'nullable|string|max:50',
            'fecha_registro_d_ac' => 'nullable|date',
            'opcion_titulacion_letra' => 'nullable|string|max:10',
            'pais' => 'nullable|string|max:100',
        ]);

        $aseguradora = Titulacion::findOrFail($id);
        $aseguradora->update($request->all());
        return response()->json($aseguradora);
    }

    
    public function destroy(string $id): JsonResponse
    {
        Titulacion::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}