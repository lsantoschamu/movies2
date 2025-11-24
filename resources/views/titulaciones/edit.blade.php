@extends('layouts.app')

@section('title', 'Editar Titulación')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Editar Titulación</h4>
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
                    <form action="{{ route('titulaciones.update', $titulacion->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Sección: Información General -->
                        <h5 class="bg-light p-2 mb-3">Información General</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- No. de Control -->
                                <div class="mb-3">
                                    <label for="no_de_control" class="form-label">
                                        No. de Control <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('no_de_control') is-invalid @enderror" 
                                        id="no_de_control" 
                                        name="no_de_control" 
                                        value="{{ old('no_de_control', $titulacion->no_de_control) }}"
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
                                        value="{{ old('periodo', $titulacion->periodo) }}"
                                        required>
                                    @error('periodo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Opción Titulación -->
                                <div class="mb-3">
                                    <label for="opcion_titulacion" class="form-label">
                                        Opción de Titulación
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('opcion_titulacion') is-invalid @enderror" 
                                        id="opcion_titulacion" 
                                        name="opcion_titulacion" 
                                        value="{{ old('opcion_titulacion', $titulacion->opcion_titulacion) }}">
                                    @error('opcion_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Opción Titulación Letra -->
                                <div class="mb-3">
                                    <label for="opcion_titulacion_letra" class="form-label">
                                        Opción Titulación (Letra)
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('opcion_titulacion_letra') is-invalid @enderror" 
                                        id="opcion_titulacion_letra" 
                                        name="opcion_titulacion_letra" 
                                        value="{{ old('opcion_titulacion_letra', $titulacion->opcion_titulacion_letra) }}">
                                    @error('opcion_titulacion_letra')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Estatus Titulación -->
                                <div class="mb-3">
                                    <label for="estatus_titulacion" class="form-label">
                                        Estatus de Titulación
                                    </label>
                                    <select class="form-select @error('estatus_titulacion') is-invalid @enderror" 
                                            id="estatus_titulacion" 
                                            name="estatus_titulacion">
                                        <option value="">Seleccionar...</option>
                                        <option value="Pendiente" {{ old('estatus_titulacion', $titulacion->estatus_titulacion) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="En Proceso" {{ old('estatus_titulacion', $titulacion->estatus_titulacion) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                        <option value="Completado" {{ old('estatus_titulacion', $titulacion->estatus_titulacion) == 'Completado' ? 'selected' : '' }}>Completado</option>
                                    </select>
                                    @error('estatus_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Clave -->
                                <div class="mb-3">
                                    <label for="clave" class="form-label">
                                        Clave
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('clave') is-invalid @enderror" 
                                        id="clave" 
                                        name="clave" 
                                        value="{{ old('clave', $titulacion->clave) }}">
                                    @error('clave')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nombre Documento Sustento -->
                                <div class="mb-3">
                                    <label for="nombre_documento_sustento" class="form-label">
                                        Nombre Documento Sustento
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('nombre_documento_sustento') is-invalid @enderror" 
                                        id="nombre_documento_sustento" 
                                        name="nombre_documento_sustento" 
                                        value="{{ old('nombre_documento_sustento', $titulacion->nombre_documento_sustento) }}">
                                    @error('nombre_documento_sustento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- País -->
                                <div class="mb-3">
                                    <label for="pais" class="form-label">
                                        País
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('pais') is-invalid @enderror" 
                                        id="pais" 
                                        name="pais" 
                                        value="{{ old('pais', $titulacion->pais) }}">
                                    @error('pais')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Fechas -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Fechas</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Fecha Solicitud Titulación -->
                                <div class="mb-3">
                                    <label for="fecha_solicitud_titulacion" class="form-label">
                                        Fecha Solicitud Titulación
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_solicitud_titulacion') is-invalid @enderror" 
                                        id="fecha_solicitud_titulacion" 
                                        name="fecha_solicitud_titulacion" 
                                        value="{{ old('fecha_solicitud_titulacion', $titulacion->fecha_solicitud_titulacion ? $titulacion->fecha_solicitud_titulacion->format('Y-m-d') : '') }}">
                                    @error('fecha_solicitud_titulacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Titulaciones -->
                                <div class="mb-3">
                                    <label for="fecha_titulaciones" class="form-label">
                                        Fecha Titulación
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_titulaciones') is-invalid @enderror" 
                                        id="fecha_titulaciones" 
                                        name="fecha_titulaciones" 
                                        value="{{ old('fecha_titulaciones', $titulacion->fecha_titulaciones ? $titulacion->fecha_titulaciones->format('Y-m-d') : '') }}">
                                    @error('fecha_titulaciones')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Expedición Título -->
                                <div class="mb-3">
                                    <label for="fecha_expedicion_titulo" class="form-label">
                                        Fecha Expedición Título <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_expedicion_titulo') is-invalid @enderror" 
                                        id="fecha_expedicion_titulo" 
                                        name="fecha_expedicion_titulo" 
                                        value="{{ old('fecha_expedicion_titulo', $titulacion->fecha_expedicion_titulo ? $titulacion->fecha_expedicion_titulo->format('Y-m-d') : '') }}"
                                        required>
                                    @error('fecha_expedicion_titulo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Fecha Recepción DGEST -->
                                <div class="mb-3">
                                    <label for="fecha_recepcion_dgest" class="form-label">
                                        Fecha Recepción DGEST
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_recepcion_dgest') is-invalid @enderror" 
                                        id="fecha_recepcion_dgest" 
                                        name="fecha_recepcion_dgest" 
                                        value="{{ old('fecha_recepcion_dgest', $titulacion->fecha_recepcion_dgest ? $titulacion->fecha_recepcion_dgest->format('Y-m-d') : '') }}">
                                    @error('fecha_recepcion_dgest')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Registro Titulación -->
                                <div class="mb-3">
                                    <label for="fecha_registro_tit" class="form-label">
                                        Fecha Registro Titulación
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_registro_tit') is-invalid @enderror" 
                                        id="fecha_registro_tit" 
                                        name="fecha_registro_tit" 
                                        value="{{ old('fecha_registro_tit', $titulacion->fecha_registro_tit ? $titulacion->fecha_registro_tit->format('Y-m-d') : '') }}">
                                    @error('fecha_registro_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Fecha Registro D AC -->
                                <div class="mb-3">
                                    <label for="fecha_registro_d_ac" class="form-label">
                                        Fecha Registro D AC
                                    </label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('fecha_registro_d_ac') is-invalid @enderror" 
                                        id="fecha_registro_d_ac" 
                                        name="fecha_registro_d_ac" 
                                        value="{{ old('fecha_registro_d_ac', $titulacion->fecha_registro_d_ac ? $titulacion->fecha_registro_d_ac->format('Y-m-d') : '') }}">
                                    @error('fecha_registro_d_ac')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Jurado -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Jurado</h5>
                        <div class="row">
                            <div class="col-md-6">
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
                                        value="{{ old('jurado_presidente', $titulacion->jurado_presidente) }}">
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
                                        value="{{ old('jurado_secretario', $titulacion->jurado_secretario) }}">
                                    @error('jurado_secretario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

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
                                        value="{{ old('jurado_vocal', $titulacion->jurado_vocal) }}">
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
                                        value="{{ old('jurado_suplente', $titulacion->jurado_suplente) }}">
                                    @error('jurado_suplente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Recepción -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Horario de Recepción</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Hora Inicio Recepción -->
                                <div class="mb-3">
                                    <label for="hora_inicio_recepcion" class="form-label">
                                        Hora Inicio
                                    </label>
                                    <input 
                                        type="time" 
                                        class="form-control @error('hora_inicio_recepcion') is-invalid @enderror" 
                                        id="hora_inicio_recepcion" 
                                        name="hora_inicio_recepcion" 
                                        value="{{ old('hora_inicio_recepcion', $titulacion->hora_inicio_recepcion) }}">
                                    @error('hora_inicio_recepcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Hora Final Recepción -->
                                <div class="mb-3">
                                    <label for="hora_final_recepcion" class="form-label">
                                        Hora Final
                                    </label>
                                    <input 
                                        type="time" 
                                        class="form-control @error('hora_final_recepcion') is-invalid @enderror" 
                                        id="hora_final_recepcion" 
                                        name="hora_final_recepcion" 
                                        value="{{ old('hora_final_recepcion', $titulacion->hora_final_recepcion) }}">
                                    @error('hora_final_recepcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Documentación -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Documentación</h5>
                        <div class="row">
                            <div class="col-md-6">
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
                                        value="{{ old('cedula_profecional', $titulacion->cedula_profecional) }}">
                                    @error('cedula_profecional')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tipo Cédula -->
                                <div class="mb-3">
                                    <label for="tipo_cedula" class="form-label">
                                        Tipo Cédula
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('tipo_cedula') is-invalid @enderror" 
                                        id="tipo_cedula" 
                                        name="tipo_cedula" 
                                        value="{{ old('tipo_cedula', $titulacion->tipo_cedula) }}">
                                    @error('tipo_cedula')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Título -->
                                <div class="mb-3">
                                    <label for="numero_titulo" class="form-label">
                                        Número Título <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_titulo') is-invalid @enderror" 
                                        id="numero_titulo" 
                                        name="numero_titulo" 
                                        value="{{ old('numero_titulo', $titulacion->numero_titulo) }}"
                                        required>
                                    @error('numero_titulo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Título Entrega -->
                                <div class="mb-3">
                                    <label for="titulo_entrega" class="form-label">
                                        Título Entrega
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('titulo_entrega') is-invalid @enderror" 
                                        id="titulo_entrega" 
                                        name="titulo_entrega" 
                                        value="{{ old('titulo_entrega', $titulacion->titulo_entrega) }}">
                                    @error('titulo_entrega')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tipo Registro -->
                                <div class="mb-3">
                                    <label for="tipo_registro" class="form-label">
                                        Tipo Registro
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('tipo_registro') is-invalid @enderror" 
                                        id="tipo_registro" 
                                        name="tipo_registro" 
                                        value="{{ old('tipo_registro', $titulacion->tipo_registro) }}">
                                    @error('tipo_registro')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Libros y Folios -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Libros y Folios</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Número Libro Titulación -->
                                <div class="mb-3">
                                    <label for="numero_libro_tit" class="form-label">
                                        Número Libro Titulación
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_libro_tit') is-invalid @enderror" 
                                        id="numero_libro_tit" 
                                        name="numero_libro_tit" 
                                        value="{{ old('numero_libro_tit', $titulacion->numero_libro_tit) }}">
                                    @error('numero_libro_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Cons Titulación -->
                                <div class="mb-3">
                                    <label for="numero_cons_tit" class="form-label">
                                        Número Consecutivo Titulación
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_cons_tit') is-invalid @enderror" 
                                        id="numero_cons_tit" 
                                        name="numero_cons_tit" 
                                        value="{{ old('numero_cons_tit', $titulacion->numero_cons_tit) }}">
                                    @error('numero_cons_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Foja Titulación -->
                                <div class="mb-3">
                                    <label for="numero_foja_tit" class="form-label">
                                        Número Foja Titulación
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_foja_tit') is-invalid @enderror" 
                                        id="numero_foja_tit" 
                                        name="numero_foja_tit" 
                                        value="{{ old('numero_foja_tit', $titulacion->numero_foja_tit) }}">
                                    @error('numero_foja_tit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Número Libro AC -->
                                <div class="mb-3">
                                    <label for="numero_libro_ac" class="form-label">
                                        Número Libro AC <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_libro_ac') is-invalid @enderror" 
                                        id="numero_libro_ac" 
                                        name="numero_libro_ac" 
                                        value="{{ old('numero_libro_ac', $titulacion->numero_libro_ac) }}"
                                        required>
                                    @error('numero_libro_ac')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Número Foja AC -->
                                <div class="mb-3">
                                    <label for="numero_foja_ac" class="form-label">
                                        Número Foja AC <span class="text-danger">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('numero_foja_ac') is-invalid @enderror" 
                                        id="numero_foja_ac" 
                                        name="numero_foja_ac" 
                                        value="{{ old('numero_foja_ac', $titulacion->numero_foja_ac) }}"
                                        required>
                                    @error('numero_foja_ac')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Antecedentes Académicos -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Antecedentes Académicos</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Periodo Ingreso Prepa -->
                                <div class="mb-3">
                                    <label for="periodo_ingreso_prepa" class="form-label">
                                        Periodo Ingreso Preparatoria
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('periodo_ingreso_prepa') is-invalid @enderror" 
                                        id="periodo_ingreso_prepa" 
                                        name="periodo_ingreso_prepa" 
                                        value="{{ old('periodo_ingreso_prepa', $titulacion->periodo_ingreso_prepa) }}">
                                    @error('periodo_ingreso_prepa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Periodo Egreso Prepa -->
                                <div class="mb-3">
                                    <label for="periodo_egresa_prepa" class="form-label">
                                        Periodo Egreso Preparatoria
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('periodo_egresa_prepa') is-invalid @enderror" 
                                        id="periodo_egresa_prepa" 
                                        name="periodo_egresa_prepa" 
                                        value="{{ old('periodo_egresa_prepa', $titulacion->periodo_egresa_prepa) }}">
                                    @error('periodo_egresa_prepa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Antecedentes -->
                                <div class="mb-3">
                                    <label for="antecedentes" class="form-label">
                                        Antecedentes
                                    </label>
                                    <textarea 
                                        class="form-control @error('antecedentes') is-invalid @enderror" 
                                        id="antecedentes" 
                                        name="antecedentes" 
                                        rows="4">{{ old('antecedentes', $titulacion->antecedentes) }}</textarea>
                                    @error('antecedentes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Información Adicional -->
                        <h5 class="bg-light p-2 mb-3 mt-4">Información Adicional</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tema -->
                                <div class="mb-3">
                                    <label for="tema" class="form-label">
                                        Tema <span class="text-danger">*</span>
                                    </label>
                                    <textarea 
                                        class="form-control @error('tema') is-invalid @enderror" 
                                        id="tema" 
                                        name="tema" 
                                        rows="3"
                                        required>{{ old('tema', $titulacion->tema) }}</textarea>
                                    @error('tema')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Observaciones -->
                                <div class="mb-3">
                                    <label for="observaciones" class="form-label">
                                        Observaciones
                                    </label>
                                    <textarea 
                                        class="form-control @error('observaciones') is-invalid @enderror" 
                                        id="observaciones" 
                                        name="observaciones" 
                                        rows="3">{{ old('observaciones', $titulacion->observaciones) }}</textarea>
                                    @error('observaciones')
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
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Titulación
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection