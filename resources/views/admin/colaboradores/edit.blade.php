@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-user-edit"></i> Editar colaborador</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('colaborador.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-label">Estatus</label>
                                                <input type="hidden" name="empleado_id" value="{{ $empleado->id}}">
                                                <select name="estatus"
                                                    class="custom-select select2bs4 @error('estatus') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    <option value="Activo" @if ($empleado->status == 'Activo') selected="selected" @endif }}>Activo</option>
                                                    <option value="No activo" @if ($empleado->status == 'No activo') selected="selected" @endif }}>No activo</option>
                                                </select>
                                                @error('estatus')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nombre" class="text-label">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ $empleado->name }}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="apellidos" class="text-label">Apellidos</label>
                                            <input type="text" name="apellidos"
                                                class="form-control @error('apellidos') is-invalid @enderror"
                                                value="{{ $empleado->apellidos }}">
                                            @error('apellidos')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label for="tipo_documento" class="text-label">Tipo de documento</label>
                                            <input type="text" name="tipo_documento"
                                                class="form-control @error('tipo_documento') is-invalid @enderror"
                                                value="{{ $empleado->tipo_documento }}">
                                            @error('tipo_documento')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label for="teléfono" class="text-label">Teléfono</label>
                                            <input type="number" name="teléfono"
                                                class="form-control @error('teléfono') is-invalid @enderror"
                                                value="{{ $empleado->telefono }}">
                                            @error('teléfono')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label for="dirección" class="text-label">Dirección</label>
                                            <input type="text" name="dirección"
                                                class="form-control @error('dirección') is-invalid @enderror"
                                                value="{{ $empleado->direccion }}">
                                            @error('dirección')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label for="correo_electrónico" class="text-label">Correo
                                                electrónico</label>
                                            <input type="text" name="correo_electrónico"
                                                class="form-control @error('correo_electrónico') is-invalid @enderror"
                                                value="{{ $empleado->email }}">
                                            @error('correo_electrónico')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label for="fecha_nacimiento" class="text-label">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                value="{{ $empleado->fecha_nacimiento }}">
                                            @error('fecha_nacimiento')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="imagen" class="text-label">Imagen destacada</label>
                                                <div class="custom-file">
                                                    <input accept="image/*" type="file"
                                                        class="custom-file-input @error('imagen') is-invalid @enderror"
                                                        name="imagen" value="{{ old('imagen') }}">
                                                    <label class="custom-file-label" for="customFile">Selecciona
                                                        imagen</label>
                                                    @error('imagen')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-sm bg-guardar">
                                            <i class="fas fa-save"></i>
                                            Registrar usuario
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-camera-retro"></i> Imagen destacada</div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @if ($empleado->imagen_colavorador)
                                        <img src="{{ asset('img/empleados/' . $empleado->imagen_colavorador) }}"
                                            class="rounded mx-auto d-block img-proveedor">
                                    @else
                                        <img src="{{ asset('img/empleados/sin_asignar/foto.png') }}"
                                            class="rounded mx-auto d-block img-proveedor">
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
