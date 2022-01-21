@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-card-header">
                        <div class="card-title"><i class="fas fa-seedling"></i> Crear categoria</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categoria.update', [$categoria->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="text-label">Nombre</label>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="proveedor_id" value="{{ $prove->id }}">
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ $categoria->name }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_de_compra" class="text-label">Fecha de descuento</label>
                                    <input type="text" disabled name="fecha_de_compra"
                                        class="form-control" value="{{ $categoria->fecha_compra }}">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="text-label">Usuario</label>
                                        <select name="usuario"
                                            class="custom-select  select2bs4 @error('usuario') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="" selected>-- Selecciona un usuario--</option>
                                            @foreach ($usuarios as $usuario)
                                                @if ($usuario->id == $categoria->user_id)
                                                    <option value="{{ $usuario->id }}" selected>
                                                        {{ $usuario->name }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }} 
                                                    </option>
                                                @else
                                                    <option value="{{ $usuario->id }}">
                                                        {{ $usuario->name }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }} 
                                                    </option>
                                                @endif

                                            @endforeach
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Selecciona un usuario </small>
                                        @error('usuario')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="text-label">Proveedor</label>
                                        <select name="proveedor"
                                            class="custom-select  select2bs4 @error('proveedor') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="" selected>-- Selecciona un proveedor--</option>
                                            @foreach ($proveedores as $proveedor)

                                            @if ($proveedor->id == $categoria->proveedor_id)
                                                <option value="{{ $proveedor->id}}" selected>
                                                    {{ $proveedor->name }} {{ $proveedor->apellidos }} 
                                                </option>
                                            @else
                                            <option value="{{ $proveedor->id}}">
                                                {{ $proveedor->name }} {{ $proveedor->apellidos }} 
                                            </option>
                                            @endif

                                            @endforeach
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Selecciona un proveedor</small>
                                        @error('proveedor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <hr>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-sm bg-guardar">
                                    <i class="fas fa-save"></i>
                                    Actualizar categoria
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
