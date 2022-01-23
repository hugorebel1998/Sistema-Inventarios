@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header bg-card-header">
                                <div class="card-title"><i class="fas fa-seedling"></i> Editar información general</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('general.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre" class="text-label">Nombre</label>
                                            <input type="hidden" name="general_id" value="{{ $general->id}}">
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ $general->name }}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="impuesto" class="text-label">Impuesto</label>
                                            <input type="text" name="impuesto"
                                                class="form-control @error('impuesto') is-invalid @enderror"
                                                value="{{ $general->impuesto }}">
                                            @error('impuesto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label for="porcentaje_impuesto" class="text-label">Porcentaje de impuesto</label>
                                            <input type="number" name="porcentaje_impuesto"
                                                class="form-control @error('porcentaje_impuesto') is-invalid @enderror"
                                                value="{{ $general->porcentaje_impuesto }}">
                                            @error('porcentaje_impuesto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="moneda" class="text-label">Moneda de pago</label>
                                            <input type="text" name="moneda"
                                                class="form-control @error('moneda') is-invalid @enderror"
                                                value="{{ $general->moneda }}">
                                            @error('moneda')
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
                                            Actualizar información
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
                                    @if ($general->logo)
                                        <img src="{{ asset('img/ajustes/' . $general->logo) }}"
                                            class="rounded mx-auto d-block img-proveedor">
                                    @else
                                        <img src="{{ asset('img/ajustes/sin-imagen.jpg') }}"
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
