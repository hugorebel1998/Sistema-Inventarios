@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-card-header">
                        <div class="card-title"><i class="fas fa-user-plus"></i> Crear usuario</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuario.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-label">Estatus</label>
                                        <select name="estatus"
                                            class="custom-select select2bs4 @error('estatus') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="" selected>-- Selecciona una opción--</option>
                                            <option value="Activo" @if (old('estatus') == 'Activo') selected="selected" @endif }}>Activo</option>
                                            <option value="No activo" @if (old('estatus') == 'No activo') selected="selected" @endif }}>No activo</option>
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
                                            <option value="" selected>-- Selecciona una opción--</option>
                                            <option value="Administrador" @if (old('perfil') == 'Administrador') selected="selected" @endif }}>Administrador</option>
                                            <option value="Colaborador" @if (old('perfil') == 'Colaborador') selected="selected" @endif }}>Colaborador</option>
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
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="apellido_paterno" class="text-label">Apellido paterno</label>
                                    <input type="text" name="apellido_paterno"
                                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                                        value="{{ old('apellido_paterno') }}">
                                    @error('apellido_paterno')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="apellido_materno" class="text-label">Apellido materno</label>
                                    <input type="text" name="apellido_materno"
                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                        value="{{ old('apellido_materno') }}">
                                    @error('apellido_materno')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="teléfono" class="text-label">Teléfono</label>
                                    <input type="number" name="teléfono"
                                        class="form-control @error('teléfono') is-invalid @enderror"
                                        value="{{ old('teléfono') }}">
                                    @error('teléfono')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="correo_electrónico" class="text-label">Correo electrónico</label>
                                    <input type="text" name="correo_electrónico"
                                        class="form-control @error('correo_electrónico') is-invalid @enderror"
                                        value="{{ old('correo_electrónico') }}">
                                    @error('correo_electrónico')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <label for="imagen" class="text-label">Imagen destacada</label>
                                        <div class="custom-file">
                                            <input accept="image/*" type="file"
                                                class="custom-file-input @error('imagen') is-invalid @enderror"
                                                name="imagen" value="{{ old('imagen') }}">
                                            <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                                            @error('imagen')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="contraseña" class="text-label">Contraseña</label>
                                    <input type="password" name="contraseña"
                                        class="form-control @error('contraseña') is-invalid @enderror"
                                        value="{{ old('contraseña') }}">
                                    @error('contraseña')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mt-4">
                                    <label for="confirmar_contraseña" class="text-label">Confirmar contraseña</label>
                                    <input type="password" @error('confirmar_contraseña') is-invalid @enderror"
                                        name="confirmar_contraseña" class="form-control">
                                    @error('confirmar_contraseña')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
        </div>
    </div>


@endsection
