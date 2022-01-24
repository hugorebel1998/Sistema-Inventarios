@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-card-header">
                        <div class="card-title"><i class="fas fa-user-plus"></i> Crear colaborador</div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="text-label">Nombre</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
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

                                  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria" class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($categorias as $categoria)
                                           <option value="{{$categoria->id}}" {{(old('categoria') == $categoria->id ? 'selected' : '')}} > {{$categoria->nombre}} </option>
                                        @endforeach
                                    </select>
                                @error('categoria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unidad de medida</label>
                                    <select name="categoria" class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($unidades as $unidad)
                                           <option value="{{$unidad->id}}" {{(old('unidad') == $unidad->id ? 'selected' : '')}} > {{$unidad->nombre}} </option>
                                        @endforeach
                                    </select>
                                @error('unidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
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
