@extends('layouts.home')
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-card-header">
                    <div class="card-title"><i class="fas fa-user-plus"></i> Crear proveedor</div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="text-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                                  value="{{ old('nombre')}}" >
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="text-label">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" 
                                 value="{{ old('apellidos') }}" >
                                @error('apellidos')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="correo_electronico" class="text-label">Correo electrónico</label>
                                <input type="text" name="correo_electronico" class="form-control @error('correo_electronico') is-invalid @enderror" 
                                  value="{{ old('correo_electronico')}}">
                                @error('correo_electronico')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="imagen" class="text-label">Imagen destacada</label>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file"
                                            class="custom-file-input @error('imagen') is-invalid @enderror"
                                            name="imagen" value="{{ old('imagen') }}">
                                        <label class="custom-file-label"for="customFile">Selecciona imagen</label>
                                        @error('imagen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono_1" class="text-label">Teléfono 1</label>
                                <input type="number" name="telefono_1" class="form-control @error('telefono_1') is-invalid @enderror" 
                                 value="{{ old('telefono_1') }}">
                                @error('telefono_1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="telefono_2" class="text-label">Teléfono 2</label>
                                <input type="number" name="telefono_2" class="form-control @error('telefono_2') is-invalid @enderror" 
                                  value="{{ old('telefono_2')}}">
                                @error('telefono_1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="calle" class="text-label">Calle</label>
                                <input type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" 
                                 value="{{ old('calle') }}">
                                @error('calle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="numero_int" class="text-label">No.interior</label>
                                <input type="text" name="numero_int" class="form-control @error('numero_int') is-invalid @enderror" 
                                  value="{{ old('numero_int')}}">
                                @error('numero_int')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="numero_ext" class="text-label">No.exterior</label>
                                <input type="text" name="numero_ext" class="form-control @error('numero_ext') is-invalid @enderror" 
                                 value="{{ old('numero_ext') }}">
                                @error('numero_ext')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          
                            <div class="col-md-6">
                                <label for="colonia" class="text-label">Colonia</label>
                                <input type="text" name="colonia" class="form-control @error('colonia') is-invalid @enderror" 
                                  value="{{ old('colonia')}}">
                                @error('colonia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="municipio" class="text-label">Municipio</label>
                                <input type="text" name="municipio" class="form-control @error('municipio') is-invalid @enderror" 
                                 value="{{ old('municipio') }}">
                                @error('municipio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <hr>

                        <div class="text-center mt-3">
                             <button type="submit" class="btn btn-sm bg-guardar">
                                <i class="fas fa-save"></i>
                                Registrar proveedor
                                </button>
                        </div>
                        </form>



                </div>

            </div>

        </div>

    </div>

</div>



@endsection