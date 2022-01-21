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
                              
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="text-label">Usuario</label>
                                    <select name="usuario" class="custom-select  select2bs4 @error('usuario') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona un usuario--</option>
                                        @foreach ($usuarios as $usuario)
                                           <option value="{{$usuario->id}}" {{(old('usuario') == $usuario->id ? 'selected' : '')}} > {{$usuario->name}} </option>
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
                                    <select name="proveedor" class="custom-select  select2bs4 @error('proveedor') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona un proveedor--</option>
                                        @foreach ($proveedores as $proveedor)
                                           <option value="{{$proveedor->id}}" {{(old('proveedor') == $proveedor->id ? 'selected' : '')}} > {{$proveedor->name}} </option>
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