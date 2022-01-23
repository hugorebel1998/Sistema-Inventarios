@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de usuarios
                        </b>
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
                                @foreach ($usuarios as $usuario)

                                    <tr  @if ($usuario->deleted_at) class="table-danger" @endif>
                                        <td>{{ $usuario->id }}</td>
                                        <td>
                                            @if (is_null($usuario->imagen_usuario))
                                                <img src="{{ asset('img/users/sin_asignar/foto.png') }}"
                                                    class="rounded mx-auto img-thumbnail" width="80">
                                            @else
                                                <img src="{{ asset('img/users/' . $usuario->imagen_usuario) }}"
                                                    class="rounded mx-auto img-thumbnail" width="80">
                                            @endif
                                        </td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->apellido_p }} {{ $usuario->apellido_m }}</td>
                                        <td>{{ $usuario->telefono }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            @if ($usuario->deleted_at)
                                                <p class="badge rounded-pill bg-danger">
                                                    No activo
                                                </p>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('usuario.restore', [$usuario->id]) }}"
                                                class="btn btn-sm bg-establecer restablecer_usuario">
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
         $(".restablecer_usuario").click(function(e) {
             e.preventDefault();
             const href = $(this).attr('href');
             Swal.fire({
                 title: 'Estas seguro de querer restablecerlo?',
                 text: `Este usuario sera restablecido`,
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
