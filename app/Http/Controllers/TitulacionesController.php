<?php

namespace App\Http\Controllers;

use App\Models\Titulaciones;
use Illuminate\Http\Request;

class TitulacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     * Función READ - Mostrar todas las titulaciones
     */
    public function index()
    {
        // Obtener todas las titulaciones ordenadas por fecha
        $titulaciones = Titulaciones::orderBy('fecha_titulaciones', 'desc')->get();

        // Retornar la vista con los datos
        return view('titulaciones.index', compact('titulaciones'));
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar el formulario de creación
     */
    public function create()
    {
        return view('titulaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     * Función CREATE - Guardar nueva titulación
     */
    public function store(Request $request)
    {
        //Validación mejorada
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
        ], [
            'no_de_control.required' => 'El número de control es obligatorio',
            'periodo.required' => 'El periodo es obligatorio',
            'opcion_titulacion.required' => 'La opción de titulación es obligatoria',
            'fecha_solicitud_titulacion.required' => 'La fecha de solicitud es obligatoria',
            'estatus_titulacion.required' => 'El estatus de titulación es obligatorio',
        ]);

        try {
            //Validación manual de las horas
            if ($request->filled('hora_inicio_recepcion') && $request->filled('hora_final_recepcion')) {
                $horaInicio = strtotime($request->hora_inicio_recepcion);
                $horaFinal = strtotime($request->hora_final_recepcion);
                
                if ($horaFinal < $horaInicio) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['hora_final_recepcion' => 'La hora final debe ser posterior o igual a la hora inicial']);
                }
            }

            //Convertir formato datetime-local a Y-m-d H:i:s
            if ($request->filled('hora_inicio_recepcion')) {
                $validatedData['hora_inicio_recepcion'] = date('Y-m-d H:i:s', strtotime($request->hora_inicio_recepcion));
            }
            if ($request->filled('hora_final_recepcion')) {
                $validatedData['hora_final_recepcion'] = date('Y-m-d H:i:s', strtotime($request->hora_final_recepcion));
            }

            // Crear nueva titulación
            Titulaciones::create($validatedData);

            return redirect()
                ->route('titulaciones.index')
                ->with('success', 'Titulación registrada exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Error al crear la titulación: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Titulaciones $titulacion)
    {
        return view('titulaciones.show', compact('titulacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titulaciones $titulacion)
    {
        return view('titulaciones.edit', compact('titulacion'));
    }

    /**
     * Update the specified resource in storage.
     * Función UPDATE - Actualizar titulación
     */
    public function update(Request $request, Titulaciones $titulacion)
    {
        //Validación mejorada
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
        ], [
            'no_de_control.required' => 'El número de control es obligatorio',
            'periodo.required' => 'El periodo es obligatorio',
            'opcion_titulacion.required' => 'La opción de titulación es obligatoria',
            'fecha_solicitud_titulacion.required' => 'La fecha de solicitud es obligatoria',
            'estatus_titulacion.required' => 'El estatus de titulación es obligatorio',
        ]);

        try {
            if ($request->filled('hora_inicio_recepcion') && $request->filled('hora_final_recepcion')) {
                $horaInicio = strtotime($request->hora_inicio_recepcion);
                $horaFinal = strtotime($request->hora_final_recepcion);
                
                if ($horaFinal < $horaInicio) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['hora_final_recepcion' => 'La hora final debe ser posterior o igual a la hora inicial']);
                }
            }

            //Convertir formato datetime-local a Y-m-d H:i:s
            if ($request->filled('hora_inicio_recepcion')) {
                $validatedData['hora_inicio_recepcion'] = date('Y-m-d H:i:s', strtotime($request->hora_inicio_recepcion));
            }
            if ($request->filled('hora_final_recepcion')) {
                $validatedData['hora_final_recepcion'] = date('Y-m-d H:i:s', strtotime($request->hora_final_recepcion));
            }

            // Actualizar la titulación
            $titulacion->update($validatedData);

            return redirect()
                ->route('titulaciones.index')
                ->with('success', 'Titulación actualizada exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Error al actualizar la titulación: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * Función DELETE - Eliminar titulación
     */
    public function destroy(Titulaciones $titulacion)
    {
        try {
            $titulacion->delete();

            return redirect()
                ->route('titulaciones.index')
                ->with('success', 'Titulación eliminada exitosamente');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Error al eliminar la titulación: ' . $e->getMessage());
        }
    }
}