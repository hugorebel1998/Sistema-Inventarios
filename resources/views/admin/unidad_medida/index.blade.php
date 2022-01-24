@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-shapes"></i>
                            Gestión de  unidades de medida
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
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-users-slash"></i>
                                         Unidades de medida eliminadas
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('unidad.create') }}" class="btn bg-indigo">
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
                                    <th scope="col">Prefijo</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($unidades as $unidad)
                                     
                                <tr>
                                    <td>{{ $unidad->id}}</td>
                                    <td>{{ $unidad->name}}</td>
                                    <td>{{ $unidad->prefijo}}</td>
                                    <td>
                                        @if ($unidad->status == 'Activo')
                                        <p class="badge rounded-pill bg-success">
                                            {{ $unidad->status}}
                                        </p>
                                        @elseif ($unidad->status == 'No activo')
                                        <span class="badge rounded-pill bg-danger">
                                            {{ $unidad->status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="p-2">
                                                <a href="{{ route('unidad.edit', [$unidad->id]) }}" class="btn btn-sm bg-edit" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                               <form action="#" method="post" class="eliminar_unidad">
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
        $('.eliminar_unidad').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta unidad de medida sera eliminada`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado esta unidad de medida.',
                        'success'
                    )
                    this.submit();
                }
            })
        });
    </script>
@endsection
@endsection