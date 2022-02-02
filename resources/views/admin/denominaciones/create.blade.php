@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-card-header">
                    <div class="card-title"><i class="fas fa-dollar-sign"></i> Crear denominación</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('denominacion.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-label">Tipo</label>
                                        <select name="tipo"
                                            class="custom-select select2bs4 @error('tipo') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="" selected>-- Selecciona una opción--</option>
                                            <option value="Moneda" @if (old('tipo') == 'Moneda') selected="selected" @endif }}>Moneda</option>
                                            <option value="Billete" @if (old('tipo') == 'Billete') selected="selected" @endif }}>Billete</option>
                                            <option value="Otro" @if (old('tipo') == 'Otro') selected="selected" @endif }}>Otro</option>

                                        </select>
                                        @error('tipo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <label for="valor" class="text-label">Valor</label>
                                <input type="number" name="valor"
                                    class="form-control @error('valor') is-invalid @enderror"
                                    value="{{ old('valor') }}">
                                    <small id="emailHelp" class="form-text text-muted">Ingresa la fecha en la que se realizo la compra</small>
                                    @error('valor')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
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
                              
                        </div>
                        <hr>

                        <div class="text-center mt-3">
                             <button type="submit" class="btn btn-sm bg-guardar">
                                <i class="fas fa-save"></i>
                                Registrar denominación
                                </button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection