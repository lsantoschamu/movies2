@extends('layouts.app')

@section('title', 'Nueva Titulación')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Titulación</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('titulaciones.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <!-- Columna Izquierda -->
                            <div class="col-md-6">
                                
                                <!-- Número de Control -->
                                <div class="mb-3">
                                    <label for="no_de_control" class="form-label">
                                        Número de Control <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('no_de_control') is-invalid @enderror" 
                                        id="no_de_control" 
                                        name="no_de_control" 
                                        value="{{ old('no_de_control') }}"
                                        placeholder="Ej: 20240001"
                                        required>
                                    @error('no_de_control')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Periodo -->
                                <div class="mb-3">
                                    <label for="periodo" class="form-label">
                                        Periodo <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('periodo') is-invalid @enderror" 
                                        id="periodo" 
                                        name="periodo" 
                                        value="{{ old('periodo') }}"
                                        placeholder="Ej: Enero-Junio 2024"
                                        required>
                                    @error('periodo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Opción Titulación -->
                                <div class="mb-3">
                                    <label for="opcion_titulacion" class="form-label">
                                        Opción de Titulación <span class="text-danger">*</span>
                                    </label>
                                    <select 
                                        class="form-select @error('opcion_titulacion') is-invalid @enderror" 
                                        id="opcion_titulacion" 
                                        name="opcion_titulacion"
                                        required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="Tesis" {{ old('opcion_titulacion') == 'Tesis' ? 'selected' : '' }}>Tesis</option>
                                        <option value="Tesina" {{ old('opcion_titulacion') == 'Tesina' ? 'selected' : '' }}>Tesina</option>
                                        <option value="Examen General" {{ old('opcion_titulacion') == 'Examen General' ? 'selected' : '' }}>Examen General</option>
                                        <option value="Promedio" {{ old('opcion_titulacion') == 'Promedio' ? 'selected' : '' }}>Promedio</option>
                                        <option value="Ceneval" {{ old('opcion_titulacion') == 'Ceneval' ? 'selected' : '' }}>Ceneval</option>
                                    </select>
                                    @error('opcion_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Solicitud Titulación -->
                                <div class="mb-3">
                                    <label for="fecha_solicitud_titulacion" class="form-label">
                                        Fecha de Solicitud <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_solicitud_titulacion') is-invalid @enderror" 
                                        id="fecha_solicitud_titulacion" 
                                        name="fecha_solicitud_titulacion" 
                                        value="{{ old('fecha_solicitud_titulacion') }}"
                                        required>
                                    @error('fecha_solicitud_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nombre Documento Sustento -->
                                <div class="mb-3">
                                    <label for="nombre_documento_sustento" class="form-label">
                                        Documento de Sustento
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('nombre_documento_sustento') is-invalid @enderror" 
                                        id="nombre_documento_sustento" 
                                        name="nombre_documento_sustento" 
                                        value="{{ old('nombre_documento_sustento') }}"
                                        placeholder="Ej: Tesis-Sistema-Web.pdf">
                                    @error('nombre_documento_sustento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Estatus Titulación -->
                                <div class="mb-3">
                                    <label for="estatus_titulacion" class="form-label">
                                        Estatus <span class="text-danger">*</span>
                                    </label>
                                    <select 
                                        class="form-select @error('estatus_titulacion') is-invalid @enderror" 
                                        id="estatus_titulacion" 
                                        name="estatus_titulacion"
                                        required>
                                        <option value="">Seleccione estatus</option>
                                        <option value="En proceso" {{ old('estatus_titulacion') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                        <option value="Aprobado" {{ old('estatus_titulacion') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                                        <option value="Pendiente" {{ old('estatus_titulacion') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="Rechazado" {{ old('estatus_titulacion') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                                        <option value="Titulado" {{ old('estatus_titulacion') == 'Titulado' ? 'selected' : '' }}>Titulado</option>
                                    </select>
                                    @error('estatus_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jurado Presidente -->
                                <div class="mb-3">
                                    <label for="jurado_presidente" class="form-label">
                                        Jurado Presidente
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('jurado_presidente') is-invalid @enderror" 
                                        id="jurado_presidente" 
                                        name="jurado_presidente" 
                                        value="{{ old('jurado_presidente') }}"
                                        placeholder="Nombre completo">
                                    @error('jurado_presidente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jurado Secretario -->
                                <div class="mb-3">
                                    <label for="jurado_secretario" class="form-label">
                                        Jurado Secretario
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('jurado_secretario') is-invalid @enderror" 
                                        id="jurado_secretario" 
                                        name="jurado_secretario" 
                                        value="{{ old('jurado_secretario') }}"
                                        placeholder="Nombre completo">
                                    @error('jurado_secretario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- Columna Derecha -->
                            <div class="col-md-6">

                                <!-- Jurado Vocal -->
                                <div class="mb-3">
                                    <label for="jurado_vocal" class="form-label">
                                        Jurado Vocal
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('jurado_vocal') is-invalid @enderror" 
                                        id="jurado_vocal" 
                                        name="jurado_vocal" 
                                        value="{{ old('jurado_vocal') }}"
                                        placeholder="Nombre completo">
                                    @error('jurado_vocal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jurado Suplente -->
                                <div class="mb-3">
                                    <label for="jurado_suplente" class="form-label">
                                        Jurado Suplente
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('jurado_suplente') is-invalid @enderror" 
                                        id="jurado_suplente" 
                                        name="jurado_suplente" 
                                        value="{{ old('jurado_suplente') }}"
                                        placeholder="Nombre completo">
                                    @error('jurado_suplente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Titulaciones -->
                                <div class="mb-3">
                                    <label for="fecha_titulaciones" class="form-label">
                                        Fecha del Examen
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_titulaciones') is-invalid @enderror" 
                                        id="fecha_titulaciones" 
                                        name="fecha_titulaciones" 
                                        value="{{ old('fecha_titulaciones') }}">
                                    @error('fecha_titulaciones')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hora Inicio Recepción -->
                                <div class="mb-3">
                                    <label for="hora_inicio_recepcion" class="form-label">
                                        Hora de Inicio
                                    </label>
                                    <input 
                                        type="time" 
                                        class="form-control @error('hora_inicio_recepcion') is-invalid @enderror" 
                                        id="hora_inicio_recepcion" 
                                        name="hora_inicio_recepcion" 
                                        value="{{ old('hora_inicio_recepcion') }}">
                                    @error('hora_inicio_recepcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hora Final Recepción -->
                                <div class="mb-3">
                                    <label for="hora_final_recepcion" class="form-label">
                                        Hora de Término
                                    </label>
                                    <input 
                                        type="time" 
                                        class="form-control @error('hora_final_recepcion') is-invalid @enderror" 
                                        id="hora_final_recepcion" 
                                        name="hora_final_recepcion" 
                                        value="{{ old('hora_final_recepcion') }}">
                                    @error('hora_final_recepcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Cédula Profesional -->
                                <div class="mb-3">
                                    <label for="cedula_profecional" class="form-label">
                                        Cédula Profesional
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('cedula_profecional') is-invalid @enderror" 
                                        id="cedula_profecional" 
                                        name="cedula_profecional" 
                                        value="{{ old('cedula_profecional') }}"
                                        placeholder="Ej: 12345678">
                                    @error('cedula_profecional')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Libro -->
                                <div class="mb-3">
                                    <label for="numero_libro_tit" class="form-label">
                                        Número de Libro
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_libro_tit') is-invalid @enderror" 
                                        id="numero_libro_tit" 
                                        name="numero_libro_tit" 
                                        value="{{ old('numero_libro_tit') }}"
                                        placeholder="Ej: LIB-001">
                                    @error('numero_libro_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Consecutivo -->
                                <div class="mb-3">
                                    <label for="numero_cons_tit" class="form-label">
                                        Número Consecutivo
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_cons_tit') is-invalid @enderror" 
                                        id="numero_cons_tit" 
                                        name="numero_cons_tit" 
                                        value="{{ old('numero_cons_tit') }}"
                                        placeholder="Ej: 001">
                                    @error('numero_cons_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Foja -->
                                <div class="mb-3">
                                    <label for="numero_foja_tit" class="form-label">
                                        Número de Foja
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_foja_tit') is-invalid @enderror" 
                                        id="numero_foja_tit" 
                                        name="numero_foja_tit" 
                                        value="{{ old('numero_foja_tit') }}"
                                        placeholder="Ej: F-123">
                                    @error('numero_foja_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('titulaciones.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Titulación
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection