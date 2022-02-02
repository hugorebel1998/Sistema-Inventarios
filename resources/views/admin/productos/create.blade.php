@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-card-header">
                    <div class="card-title"><i class="fas fa-box-open"></i> Crear producto</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="text-label">Categoria</label>
                                    <select name="categoria"
                                        class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" {{(old('categoria')==$categoria->id ?
                                            'selected' : '')}} > {{$categoria->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('categoria')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-label">Unidad de medida</label>
                                    <select name="unidad"
                                        class="custom-select  select2bs4 @error('unidad') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($unidades as $unidad)
                                        <option value="{{$unidad->id}}" {{(old('unidad')==$unidad->id ? 'selected' :'')}} >
                                             {{$unidad->name}}
                                             </option>
                                        @endforeach
                                    </select>
                                    @error('unidad')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="costo" class="text-label">Costo</label>
                                <input type="number" name="costo"
                                    class="form-control @error('costo') is-invalid @enderror"
                                    value="{{ old('costo') }}">
                                @error('costo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="precio_venta" class="text-label">Precio venta</label>
                                <input type="number" name="precio_venta"
                                    class="form-control @error('precio_venta') is-invalid @enderror"
                                    value="{{ old('precio_venta') }}">
                                @error('precio_venta')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="existencia" class="text-label">Existencia</label>
                                <input type="number" name="existencia"
                                    class="form-control @error('existencia') is-invalid @enderror"
                                    value="{{ old('existencia') }}">
                                @error('existencia')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="nivel_existencia" class="text-label">Nivel de existencia</label>
                                <input type="number" name="nivel_existencia"
                                    class="form-control @error('nivel_existencia') is-invalid @enderror"
                                    value="{{ old('nivel_existencia') }}">
                                @error('nivel_existencia')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="descripción" class="text-label">Breve descricion</label>
                                <textarea class="form-control @error('descripción') is-invalid @enderror" 
                                name="descripción" rows="5">{{ old('descripción')}}</textarea>
                                @error('descripción')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <hr>
                <div class="text-center mt-3 mb-4">
                    <button type="submit" class="btn btn-sm bg-guardar ">
                        <i class="fas fa-save"></i>
                        Registrar producto
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection