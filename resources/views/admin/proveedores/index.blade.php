@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-user-friends"></i>
                            Gestión de  proveedores
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
                                        Proveedores eliminados
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="p-2">
                            <a href="{{ route('proveedor.create') }}" class="btn bg-indigo">
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
                                    <th scope="col"></th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Dirreción</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($proveedores as $proveedor)
                                     
                                <tr>
                                    <td>{{ $proveedor->id}}</td>
                                    <td><img src="{{ asset('img/proveedores/' . $proveedor->imagen_proveedor) }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                    </td>
                                    <td>{{ $proveedor->name}}</td>
                                    <td>{{ $proveedor->apellidos}}</td>
                                    <td>
                                        <p>
                                            {{ $proveedor->telefono_1}} <br>
                                            {{ $proveedor->telefono_2}}
                                        </p>
                                            
                                    </td>
                                    <td>{{ $proveedor->email}}</td>
                                    <td>
                                        <p> {{ $proveedor->calle}} {{ $proveedor->numero_int}} {{ $proveedor->numero_ext}}  </br>
                                        {{ $proveedor->colonia}} {{ $proveedor->municipio}} </p>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="p-2">
                                                <a href="{{ route('proveedor.edit', [$proveedor->id]) }}" class="btn btn-sm bg-edit" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                               <form action="{{ route('proveedor.delete', [$proveedor->id]) }}" method="post" class="eliminar_proveedor">
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
        $('.eliminar_proveedor').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este proveedor sera eliminado`,
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