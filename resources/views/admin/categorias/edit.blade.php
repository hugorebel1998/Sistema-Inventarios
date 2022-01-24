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
                        <form action="{{ route('categoria.update', [$categoria->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>¿En descuento?</label>
                                        <select name="estatus"
                                            class="custom-select select2bs4 @error('estatus') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="Activo" @if ($categoria->status == 'Activo') selected @endif>Activo</option>
                                            <option value="Bloqueado" @if ($categoria->status == 'Bloqueado') selected @endif>Bloqueado</option>
                                        </select>
                                        @error('estatus')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre" class="text-label">Nombre</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ $categoria->name }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_de_compra" class="text-label">Fecha de descuento</label>
                                    <input type="date" name="fecha_de_compra" class="form-control"
                                        value="{{ $categoria->fecha_compra }}">
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
