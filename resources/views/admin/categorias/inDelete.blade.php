@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-shapes"></i>
                            Gestión de  categorias eliminadas
                        </b>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table-striped table table-hover" cellspacing="0" width="100%" id="example2">
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
                                     
                                <tr  @if ($categoria->deleted_at) class="table-danger" @endif>
                                    <td>{{ $categoria->id}}</td>
                                    <td>{{ $categoria->name}}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($categoria->fecha_compra)->formatLocalized('%A %d, %B %Y')}}
                                    </td>
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
                                        <a href="{{ route('categoria.restore', [$categoria->id]) }}" 
                                            class="btn btn-sm bg-establecer restablecer_categoria">
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
        $(".restablecer_categoria").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Esta categoria sera restablecida`,
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