@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-users-slash"></i>
                            Gestión de proveedores eliminados
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
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Dirreción</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)

                                    <tr @if ($proveedor->deleted_at) class="table-danger" @endif>
                                        <td>{{ $proveedor->id }}</td>
                                        <td>
                                            @if (is_null($proveedor->imagen_proveedor))
                                            <img src="{{ asset('img/proveedores/sin_asignar/foto.jpg') }}"
                                            class="rounded mx-auto img-thumbnail" width="80">
                                            @else  
                                            <img src="{{ asset('img/proveedores/' . $proveedor->imagen_proveedor) }}"
                                            class="rounded mx-auto img-thumbnail" width="80">
                                            @endif
                                        </td>
                                        <td>{{ $proveedor->name }} {{ $proveedor->apellidos }}</td>
                                        <td>
                                            <p>
                                                {{ $proveedor->telefono_1 }} <br>
                                                {{ $proveedor->telefono_2 }}
                                            </p>

                                        </td>
                                        <td>{{ $proveedor->email }}</td>
                                        <td>
                                            <p> {{ $proveedor->calle }} {{ $proveedor->numero_int }}
                                                {{ $proveedor->numero_ext }} </br>
                                                {{ $proveedor->colonia }} {{ $proveedor->municipio }} </p>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('provedore.restore', [$proveedor->id]) }}"
                                                class="btn btn-sm bg-establecer restablecer_proveedor">
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
        $(".restablecer_proveedor").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Este proveedor sera restablecido`,
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
