@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-user-edit"></i> Editar usuario</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('usuario.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-label">Estatus</label>
                                                <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                                                <select name="estatus"
                                                    class="custom-select select2bs4 @error('estatus') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    <option value="Activo" @if ($usuario->status == 'Activo') selected="selected" @endif }}>Activo</option>
                                                    <option value="No activo" @if ($usuario->status == 'No activo') selected="selected" @endif }}>No activo</option>
                                                </select>
                                                @error('estatus')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-label">Tipo de usuario</label>
                                                <select name="perfil"
                                                    class="custom-select select2bs4 @error('perfil') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    <option value="Administrador" @if ($usuario->perfil == 'Administrador') selected="selected" @endif }}>Administrador
                                                    </option>
                                                    <option value="Gerente" @if ($usuario->perfil == 'Gerente') selected="selected" @endif }}>Gerente
                                                    </option>
                                                </select>
                                                @error('perfil')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4">
                                            <label for="nombre" class="text-label">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ $usuario->name }}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="apellido_paterno" class="text-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno"
                                                class="form-control @error('apellido_paterno') is-invalid @enderror"
                                                value="{{ $usuario->apellido_p }}">
                                            @error('apellido_paterno')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="apellido_materno" class="text-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno"
                                                class="form-control @error('apellido_materno') is-invalid @enderror"
                                                value="{{ $usuario->apellido_m }}">
                                            @error('apellido_materno')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="teléfono" class="text-label">Teléfono</label>
                                            <input type="number" name="teléfono"
                                                class="form-control @error('teléfono') is-invalid @enderror"
                                                value="{{ $usuario->telefono }}">
                                            @error('teléfono')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="correo_electrónico" class="text-label">Correo electrónico</label>
                                            <input type="text" name="correo_electrónico"
                                                class="form-control @error('correo_electrónico') is-invalid @enderror"
                                                value="{{ $usuario->email }}">
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
                                    <hr>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-sm bg-guardar">
                                            <i class="fas fa-save"></i>
                                            Actualizar usuario
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
                                    @if ($usuario->imagen_usuario)
                                        <img src="{{ asset('img/users/' . $usuario->imagen_usuario) }}"
                                            class="rounded mx-auto d-block img-proveedor">
                                    @else
                                        <img src="{{ asset('img/users/sin_asignar/foto.png') }}"
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
