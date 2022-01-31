@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-child"></i>
                            Gestión de clientes eliminados
                        </b>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table-striped table table-hover" cellspacing="0" width="100%"
                            id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)

                                    <tr @if ($cliente->deleted_at) class="table-danger" @endif>
                                        <td>{{ $cliente->id }}</td>
                                        <td>
                                            @if (is_null($cliente->imagen_cliente))
                                                <img src="{{ asset('img/clientes/sin_asignar/foto.png') }}"
                                                    class="rounded mx-auto img-thumbnail" width="60">
                                            @else
                                                <img src="{{ asset('img/clientes/' . $cliente->imagen_cliente) }}"
                                                    class="rounded mx-auto img-thumbnail" width="60">
                                            @endif
                                        </td>
                                      
                                        <td>{{ $cliente->name }} {{ $cliente->apellidos }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td @if ($cliente->deleted_at) class="table-danger" @endif>
                                            @if ($cliente->deleted_at)
                                                <p class="badge rounded-pill bg-danger">
                                                    No activo
                                                </p>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('cliente.restore', [$cliente->id]) }}"
                                                class="btn btn-sm bg-establecer restablecer_cliente">
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
         $(".restablecer_cliente").click(function(e) {
             e.preventDefault();
             const href = $(this).attr('href');
             Swal.fire({
                 title: 'Estas seguro de querer restablecerlo?',
                 text: `Este cliente sera restablecido`,
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
