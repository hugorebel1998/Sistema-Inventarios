@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-card-header">
                        <div class="card-title"><i class="fas fa-user-plus"></i> Editar unidad de medida</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('unidad.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-label">Estatus</label>
                                        <select name="estatus"
                                            class="custom-select select2bs4 @error('estatus') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="Activo" @if ($unidad->status == 'Activo') selected @endif>Activo</option>
                                            <option value="No activo" @if ($unidad->status == 'No activo') selected @endif>No activo</option>
                                        </select>
                                        @error('estatus')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="nombre" class="text-label">Nombre</label>
                                    <input type="hidden" name="unidad_id" value="{{ $unidad->id}}">
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ $unidad->name }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="prefijo" class="text-label">Prefijo</label>
                                    <input type="text" name="prefijo"
                                        class="form-control @error('prefijo') is-invalid @enderror"
                                        value="{{ $unidad->prefijo }}">
                                    @error('prefijo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-sm bg-guardar">
                                    <i class="fas fa-save"></i>
                                    Registrar unidad de medida
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
