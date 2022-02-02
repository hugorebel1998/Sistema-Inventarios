@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-card-header">
                            <div class="card-title"><i class="fas fa-user-plus"></i> Editar cliente "{{ $cliente->name}}
                                {{ $cliente->apellidos}}"</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clientes.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <label for="nombre" class="text-label">Nombre</label>
                                        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ $cliente->name }}">
                                        @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <label for="apellidos" class="text-label">Apellidos</label>
                                        <input type="text" name="apellidos"
                                            class="form-control @error('apellidos') is-invalid @enderror"
                                            value="{{ $cliente->apellidos }}">
                                        @error('apellidos')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label class="text-label">Tipo de documento</label>
                                            <select name="tipo_documento"
                                                class="custom-select select2bs4 @error('tipo_documento') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="Ine" @if ($cliente->tipo_documento == 'Ine')
                                                    selected="selected" @endif }}>Ine</option>
                                                <option value="Curp" @if ($cliente->tipo_documento == 'Curp')
                                                    selected="selected" @endif }}>Curp</option>
                                                <option value="Licencia" @if ($cliente->tipo_documento == 'Licencia')
                                                    selected="selected" @endif }}>Licencia</option>
                                                <option value="Pasaporte" @if ($cliente->tipo_documento == 'Pasaporte')
                                                    selected="selected" @endif }}>Pasaporte</option>
                                                <option value="Otro" @if ($cliente->tipo_documento == 'Otro')
                                                    selected="selected" @endif }}>Otro</option>
                                            </select>
                                            @error('tipo_documento')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label for="teléfono" class="text-label">Teléfono</label>
                                        <input type="number" name="teléfono"
                                            class="form-control @error('teléfono') is-invalid @enderror"
                                            value="{{ $cliente->telefono }}">
                                        @error('teléfono')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label for="dirección" class="text-label">Dirección</label>
                                        <input type="text" name="dirección"
                                            class="form-control @error('dirección') is-invalid @enderror"
                                            value="{{ $cliente->direccion }}">
                                        @error('dirección')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <label for="correo_electrónico" class="text-label">Correo electrónico</label>
                                        <input type="text" name="correo_electrónico"
                                            class="form-control @error('correo_electrónico') is-invalid @enderror"
                                            value="{{ $cliente->email }}">
                                        @error('correo_electrónico')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-4">
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
                        </div>
                        <hr>
                        <div class="text-center mt-3 mb-4">
                            <button type="submit" class="btn btn-sm bg-guardar">
                                <i class="fas fa-save"></i>
                               Actualizar cliente
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-card-header">
                            <div class="card-title"><i class="fas fa-camera-retro"></i> Imagen destacada</div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                @if ($cliente->imagen_cliente)
                                    <img src="{{ asset('img/clientes/' . $cliente->imagen_cliente) }}"
                                        class="rounded mx-auto d-block img-proveedor">
                                        <p class="text-imagen">{{$cliente->imagen_cliente }}</p>
                                @else
                                    <img src="{{ asset('img/clientes/sin_asignar/foto.png') }}"
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