@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-shapes"></i>
                            Gestión de  categorias
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
                                    <a class="dropdown-item" href="{{ route('categorias.index.delete') }}">
                                        <i class="fas fa-users-slash"></i>
                                         Categorias eliminadas
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('categoria.create') }}" class="btn bg-indigo">
                                <i class="fas fa-plus"></i>
                                Agregar
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-striped table-hover" cellspacing="0" width="100%" id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha compra</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($categorias as $categoria)
                                     
                                <tr>
                                    <td>{{ $categoria->id}}</td>
                                    <td>{{ $categoria->name}}</td>
                                    <td>{{ $categoria->fecha_compra}}</td>
                                    <td>
                                        @if ($categoria->status == 'Activo')
                                        <p class="badge rounded-pill bg-success">
                                            {{ $categoria->status}}
                                        </p>
                                        @elseif ($categoria->status == 'Bloqueado')
                                        <span class="badge rounded-pill bg-danger">
                                            {{ $categoria->status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="p-2">
                                                <a href="{{ route('categoria.edit', [$categoria->id])}}" class="btn btn-sm bg-edit" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                               <form action="{{ route('categoria.delete', [$categoria->id]) }}" method="post" class="eliminar_categoria">
                                                   @csrf
                                                   @method('delete')
                                                   <button type="submit" class="btn btn-sm bg-delete" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                   </button>
                                               </form>
                                            </div>
                                          </div>

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
        $('.eliminar_categoria').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta categoria sera eliminada`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado esta categoria.',
                        'success'
                    )
                    this.submit();
                }
            })
        });
    </script>
@endsection
@endsection