@extends('layouts.app')

@section('title', 'Titulaciones')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Titulaciones</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('titulaciones.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Titulación
            </a>
        </div>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($titulaciones->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Periodo</th>
                                <th>Opción Titulación</th>
                                <th>Fecha Solicitud</th>
                                <th>Estatus</th>
                                <th>Fecha Titulación</th>
                                <th>Cédula Profesional</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($titulaciones as $titulacion)
                                <tr>
                                    <td>{{ $titulacion->periodo }}</td>
                                    <td>{{ $titulacion->opcion_titulacion }}</td>
                                    <td>{{ \Carbon\Carbon::parse($titulacion->fecha_solicitud_titulacion)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($titulacion->estatus_titulacion == 'Aprobado') bg-success
                                            @elseif($titulacion->estatus_titulacion == 'Pendiente') bg-warning
                                            @elseif($titulacion->estatus_titulacion == 'Rechazado') bg-danger
                                            @else bg-secondary
                                            @endif">
                                            {{ $titulacion->estatus_titulacion }}
                                        </span>
                                    </td>
                                    <td>{{ $titulacion->fecha_titulaciones ? \Carbon\Carbon::parse($titulacion->fecha_titulaciones)->format('d/m/Y') : 'N/A' }}</td>
                                    <td>{{ $titulacion->cedula_profecional ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('titulaciones.show', $titulacion->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('titulaciones.edit', $titulacion->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('titulaciones.destroy', $titulacion->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Deseas eliminar esta titulación?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay titulaciones registradas.
                    <a href="{{ route('titulaciones.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection