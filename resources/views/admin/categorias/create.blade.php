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
                    <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="text-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                                  value="{{ old('nombre')}}" >
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_de_compra" class="text-label">Fecha de descuento</label>
                                <input type="date" name="fecha_de_compra"
                                    class="form-control @error('fecha_de_compra') is-invalid @enderror"
                                    value="{{ old('fecha_de_compra') }}">
                                    <small id="emailHelp" class="form-text text-muted">Ingresa la fecha en la que se realizo la compra</small>
                                @error('fecha_de_compra')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                              
                        </div>
                        <hr>

                        <div class="text-center mt-3">
                             <button type="submit" class="btn btn-sm bg-guardar">
                                <i class="fas fa-save"></i>
                                Registrar categoria
                                </button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection