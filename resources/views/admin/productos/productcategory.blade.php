@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de  Categoria / Productos
                        </b>
                    </div>
                  
                    <div class="card-body">
                       
                        <table class="order-table table-striped table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col"></th>
                                    <th scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($productoCategories as $productoCategory)
                                     
                                <tr>
                                    <td>{{ $productoCategory->id}}</td>
                                    <td>{{ $productoCategory->name}}</td>
                                    @foreach ($categorias as $categoria)
                                         @if ($productoCategory->category_id == $categoria->id)
                                         <td>{{ $categoria->name }}</td>
                                         @endif
                                    @endforeach 
                                    @foreach ($unidades as $unidad)
                                    @if ($productoCategory->unidad_id == $unidad->id)
                                    <td>{{ $unidad->name}}</td>
                                    @endif
                                    @endforeach     
                                   
                                   
                                    <td><img src="{{ asset('img/productos/' . $productoCategory->imagen_producto) }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                    </td>
                                  
                                    <td @if ($productoCategory->status == 'Activo') class='table-success'  @else class='table-danger' @endif>
                                        @if ($productoCategory->status == 'Activo')
                                        <p class="badge rounded-pill bg-success">
                                            {{ $productoCategory->status}}
                                        </p>
                                        @elseif ($productoCategory->status == 'No activo')
                                        <span class="badge rounded-pill bg-danger">
                                            {{ $productoCategory->status}}
                                        </span>
                                        @endif
                                    </td>
                                    

                                   
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection