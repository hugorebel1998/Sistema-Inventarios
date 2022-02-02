@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de usuarios
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
                                    <a class="dropdown-item" href="{{ route('usuarios.index.delete') }}">
                                            <i class=" fas fa-users-slash"></i>
                                        Usuarios eliminados
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('usuario.create') }}" class="btn bg-indigo">
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
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Perfil</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo electrónico</th>
                                    {{-- <th scope="col">Estatus</th> --}}
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)

                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>
                                            @if (is_null($usuario->imagen_usuario))
                                                <img src="{{ asset('img/users/sin_asignar/foto.png') }}"
                                                    class="rounded mx-auto img-thumbnail" width="60">
                                            @else
                                                <img src="{{ asset('img/users/' . $usuario->imagen_usuario) }}"
                                                    class="rounded mx-auto img-thumbnail" width="60">
                                            @endif
                                        </td>
                                        <td @if ($usuario->status == 'Activo') class="table-success"  @else class="table-danger" @endif>
                                            <p>
                                                <b>{{ $usuario->perfil }}</b>
                                            </p> 
                                            @if ($usuario->status == 'Activo')
                                                <p class="badge rounded-pill bg-success">
                                                    {{ $usuario->status }}
                                                </p>
                                            @elseif ($usuario->status == 'No activo')
                                                <span class="badge rounded-pill bg-danger">
                                                    {{ $usuario->status }}
                                                </span>
                                            @endif

                                         </td>
                                        <td>{{ $usuario->name }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }}</td>
                                        <td>{{ $usuario->telefono }}</td>
                                        <td>{{ $usuario->email }}</td>
                                      

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2">
                                                    <a href="{{ route('usuario.edit', [$usuario->id]) }}" class="btn btn-sm bg-edit" title="Editar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="p-2">
                                                    <form action="{{ route('usuario.delete', [$usuario->id]) }}" method="post" class="eliminar_usuario">
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
                text: `Este usuario sera eliminado`,
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
