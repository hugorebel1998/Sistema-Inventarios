@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-user-edit"></i> Editar proveedor</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('proveedor.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre" class="text-label">Nombre</label>
                                            <input type="hidden" name="proveedor_id" value="{{ $proveedor->id }}">
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ $proveedor->name }}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="apellidos" class="text-label">Apellidos</label>
                                            <input type="text" name="apellidos"
                                                class="form-control @error('apellidos') is-invalid @enderror"
                                                value="{{ $proveedor->apellidos }}">
                                            @error('apellidos')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="correo_electrónico" class="text-label">Correo
                                                electrónico</label>
                                            <input type="text" name="correo_electrónico"
                                                class="form-control @error('correo_electrónico') is-invalid @enderror"
                                                value="{{ $proveedor->email }}">
                                            @error('correo_electrónico')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <label for="telefono_1" class="text-label">Teléfono 1</label>
                                            <input type="number" name="telefono_1"
                                                class="form-control @error('telefono_1') is-invalid @enderror"
                                                value="{{ $proveedor->telefono_1 }}">
                                            @error('telefono_1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telefono_2" class="text-label">Teléfono 2</label>
                                            <input type="number" name="telefono_2"
                                                class="form-control @error('telefono_2') is-invalid @enderror"
                                                value="{{ $proveedor->telefono_2 }}">
                                            @error('telefono_1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="calle" class="text-label">Calle</label>
                                            <input type="text" name="calle"
                                                class="form-control @error('calle') is-invalid @enderror"
                                                value="{{ $proveedor->calle }}">
                                            @error('calle')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="numero_int" class="text-label">No.interior</label>
                                            <input type="text" name="numero_int"
                                                class="form-control @error('numero_int') is-invalid @enderror"
                                                value="{{ $proveedor->numero_int }}">
                                            @error('numero_int')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="numero_ext" class="text-label">No.exterior</label>
                                            <input type="text" name="numero_ext"
                                                class="form-control @error('numero_ext') is-invalid @enderror"
                                                value="{{ $proveedor->numero_ext }}">
                                            @error('numero_ext')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="colonia" class="text-label">Colonia</label>
                                            <input type="text" name="colonia"
                                                class="form-control @error('colonia') is-invalid @enderror"
                                                value="{{ $proveedor->colonia }}">
                                            @error('colonia')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="municipio" class="text-label">Municipio</label>
                                            <input type="text" name="municipio"
                                                class="form-control @error('municipio') is-invalid @enderror"
                                                value="{{ $proveedor->municipio }}">
                                            @error('municipio')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-sm bg-guardar">
                                            <i class="fas fa-save"></i>
                                            Actualizar proveedor
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-camera-retro"></i> Imagen destacada</div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @if ($proveedor->imagen_proveedor)
                                        <img src="{{ asset('img/proveedores/' . $proveedor->imagen_proveedor) }}"
                                            class="rounded mx-auto d-block img-proveedor">
                                    @else
                                        <img src="{{ asset('img/proveedores/sin_asignar/foto.jpg') }}"
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
