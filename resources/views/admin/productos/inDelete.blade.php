@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de  productos
                        </b>
                    </div>
                    <div class="d-flex flex-row-reverse mr-4">

                        <div class="p-2">

                            <div class="dropdown dropleft">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('provedores.index.delete') }}">
                                        <i class="fas fa-users-slash"></i>
                                        Productos eliminados
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('producto.create') }}" class="btn bg-indigo">
                                <i class="fas fa-plus"></i>
                                Agregar
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
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
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($productos as $producto)
                                     
                                <tr>
                                    <td>{{ $producto->id}}</td>
                                    <td>{{ $producto->name}}</td>
                                    @foreach ($categorias as $categoria)
                                         @if ($producto->category_id == $categoria->id)
                                         <td>{{ $categoria->name }}</td>
                                         @endif
                                    @endforeach 
                                    @foreach ($unidades as $unidad)
                                    @if ($producto->unidad_id == $unidad->id)
                                    <td>{{ $unidad->name}}</td>
                                    @endif
                                    @endforeach     
                                   
                                   
                                    <td><img src="{{ asset('img/productos/' . $producto->imagen_producto) }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                    </td>
                                  
                                    <td class='table-danger'>
                                        @if ($producto->deleted_at)
                                                <p class="badge rounded-pill bg-danger">
                                                    No activo
                                                </p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('producto.restore', [$producto->id]) }}"
                                            class="btn btn-sm bg-establecer restablecer_producto">
                                            <i class="fas fa-trash-restore"></i>
                                            Restablecer
                                        </a>
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
    @section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".restablecer_producto").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Este producto sera restablecido`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Éxito',
                    'Este registro fue restablecido.',
                    'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection
@endsection