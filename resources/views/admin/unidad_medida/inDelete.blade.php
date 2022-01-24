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
                                     
                                <tr @if ($unidad->status == 'Activo') class='table-success' @else  class='table-danger'@endif>
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
@endsection@section('alerta')
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