@extends('layouts.app')

@section('title', 'Detalles de Titulación')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Detalles de la Titulación</h4>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <!-- Columna Izquierda -->
                        <div class="col-md-6">
                            
                            <div class="mb-3">
                                <strong>Periodo:</strong>
                                <p class="text-muted">{{ $titulacion->periodo ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Opción de Titulación:</strong>
                                <p class="text-muted">{{ $titulacion->opcion_titulacion ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Fecha de Solicitud:</strong>
                                <p class="text-muted">
                                    @if($titulacion->fecha_solicitud_titulacion)
                                        {{ \Carbon\Carbon::parse($titulacion->fecha_solicitud_titulacion)->format('d/m/Y') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>Documento de Sustento:</strong>
                                <p class="text-muted">{{ $titulacion->nombre_documento_sustento ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Estatus:</strong>
                                <p>
                                    @if($titulacion->estatus_titulacion)
                                        <span class="badge 
                                            @if($titulacion->estatus_titulacion == 'Aprobado') bg-success
                                            @elseif($titulacion->estatus_titulacion == 'Pendiente') bg-warning
                                            @elseif($titulacion->estatus_titulacion == 'En Proceso') bg-info
                                            @elseif($titulacion->estatus_titulacion == 'Rechazado') bg-danger
                                            @else bg-secondary
                                            @endif">
                                            {{ $titulacion->estatus_titulacion }}
                                        </span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>Fecha de Titulación:</strong>
                                <p class="text-muted">
                                    @if($titulacion->fecha_titulaciones)
                                        {{ \Carbon\Carbon::parse($titulacion->fecha_titulaciones)->format('d/m/Y') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>Cédula Profesional:</strong>
                                <p class="text-muted">{{ $titulacion->cedula_profecional ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Hora Inicio Recepción:</strong>
                                <p class="text-muted">
                                    @if($titulacion->hora_inicio_recepcion)
                                        {{ \Carbon\Carbon::parse($titulacion->hora_inicio_recepcion)->format('d/m/Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>Hora Final Recepción:</strong>
                                <p class="text-muted">
                                    @if($titulacion->hora_final_recepcion)
                                        {{ \Carbon\Carbon::parse($titulacion->hora_final_recepcion)->format('d/m/Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                        </div>

                        <!-- Columna Derecha -->
                        <div class="col-md-6">

                            <h5 class="mb-3 text-muted">Información del Jurado</h5>

                            <div class="mb-3">
                                <strong>Jurado Presidente:</strong>
                                <p class="text-muted">{{ $titulacion->jurado_presidente ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Jurado Secretario:</strong>
                                <p class="text-muted">{{ $titulacion->jurado_secretario ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Jurado Vocal:</strong>
                                <p class="text-muted">{{ $titulacion->jurado_vocal ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Jurado Suplente:</strong>
                                <p class="text-muted">{{ $titulacion->jurado_suplente ?? 'N/A' }}</p>
                            </div>

                            <h5 class="mb-3 mt-4 text-muted">Información de Registro</h5>

                            <div class="mb-3">
                                <strong>Número de Libro:</strong>
                                <p class="text-muted">{{ $titulacion->numero_libro_tit ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Número Consecutivo:</strong>
                                <p class="text-muted">{{ $titulacion->numero_cons_tit ?? 'N/A' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Número de Foja:</strong>
                                <p class="text-muted">{{ $titulacion->numero_foja_tit ?? 'N/A' }}</p>
                            </div>

                        </div>
                    </div>

                    <!-- Información de Auditoría -->
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">
                                <strong>Fecha de Creación:</strong> 
                                {{ $titulacion->created_at ? $titulacion->created_at->format('d/m/Y H:i') : 'N/A' }}
                            </small>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">
                                <strong>Última Actualización:</strong> 
                                {{ $titulacion->updated_at ? $titulacion->updated_at->format('d/m/Y H:i') : 'N/A' }}
                            </small>
                        </div>
                    </div>

                </div>

                <!-- Botones de Acción -->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('titulaciones.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver al Listado
                        </a>
                        <div>
                            <a href="{{ route('titulaciones.edit', $titulacion->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('titulaciones.destroy', $titulacion->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar esta titulación?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection