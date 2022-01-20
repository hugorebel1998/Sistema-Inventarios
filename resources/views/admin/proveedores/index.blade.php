@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header text-indigo">
                        <b class="lead font-weight-bold">
                            <i class="fas fa-user-friends"></i>
                            Proveedores
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
                                        Usuarios eliminados
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
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"></th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    {{-- <td>{{ $usuario->email }}</td> --}}

                                    <td class="text-center">

                                        <div class="d-flex justify-content-center">
                                            <div class="p-2">
                                                <a href="#" class="btn btn-sm bg-ver" title="Ver">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                <a href="#" class="btn btn-sm bg-edit" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                <a href="#" class="btn btn-sm bg-delete" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                          </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection