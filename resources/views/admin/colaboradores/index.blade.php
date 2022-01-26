@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de colaboradores
                        </b>
                    </div>
                    <div class="d-flex flex-row-reverse mr-4">
                        <div class="p-2">
                            <a href="{{ route('colaborador.excel') }}" class="btn bg-excel" title="Exportar a excel"><i class="far fa-file-excel"></i> Excel</a>
                        </div>
                        <div class="p-2">

                            <div class="dropdown dropleft">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('colaboradores.index.delete') }}">
                                            <i class=" fas fa-users-slash"></i>
                                        Colaboradores eliminados
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('colaborador.create') }}" class="btn bg-indigo">
                                <i class="fas fa-plus"></i>
                                Agregar
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table-striped table table-hover" cellspacing="0" width="100%"
                            id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"></th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)

                                    <tr>
                                        <td>{{ $empleado->id }}</td>
                                        <td>
                                            @if (is_null($empleado->imagen_colavorador))
                                                <img src="{{ asset('img/empleados/sin_asignar/foto.png') }}"
                                                    class="rounded mx-auto img-thumbnail" width="80">
                                            @else
                                                <img src="{{ asset('img/empleados/' . $empleado->imagen_colavorador) }}"
                                                    class="rounded mx-auto img-thumbnail" width="80">
                                            @endif
                                        </td>
                                        <td>{{ $empleado->name }}</td>
                                        <td>{{ $empleado->apellidos}}</td>
                                        <td>{{ $empleado->telefono }}</td>
                                        <td>{{ $empleado->email }}</td>
                                        <td  @if ($empleado->status == 'Activo') class="table-success"  @else class="table-danger" @endif>
                                            @if ($empleado->status == 'Activo')
                                                <p class="badge rounded-pill bg-success">
                                                    {{ $empleado->status }}
                                                </p>
                                            @elseif ($empleado->status == 'No activo')
                                                <span class="badge rounded-pill bg-danger">
                                                    {{ $empleado->status }}
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2">
                                                    <a href="{{ route('colaborador.edit', [$empleado->id]) }}" class="btn btn-sm bg-edit" title="Editar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </div>

                                                <div class="p-2">
                                                    <form action="{{ route('colaborador.delete', [$empleado->id]) }}" method="post" class="eliminar_usuario">
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
        $('.eliminar_usuario').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este empleado sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado este registro.',
                        'success'
                    )
                    this.submit();
                }
            })
        });
    </script>
@endsection
@endsection
