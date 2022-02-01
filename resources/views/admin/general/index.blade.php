@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo card-outline transparente shadow-lg">
                    <div class="card-header">
                        <b class="card-title-text">
                            <i class="fas fa-sliders-h"></i>
                            Configuración general
                        </b>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-striped table-hove" cellspacing="0" width="100%" id="example2">
                            <thead class="text-white" style="background: #3f4570">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    {{-- <th scope="col">Tipo de impuesto</th>
                                    <th scope="col">Porcentaje</th> --}}
                                    <th scope="col">Moneda</th>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($generales as $general)
                                     
                                <tr>
                                    <td>{{ $general->id}}</td>
                                    <td>{{ $general->name}}</td>
                                    {{-- <td>{{ $general->impuesto}}</td>
                                    <td>{{ $general->porcentaje_impuesto }} %</td> --}}
                                    <td>{{ $general->moneda }}</td>
                                    <td>
                                        @if (is_null($general->logo))
                                        <img src="{{ asset('img/ajustes/sin-imagen.jpg') }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                        @else
                                        <img src="{{ asset('img/ajustes/'.$general->logo) }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                            
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="p-2">
                                                <a href="{{ route('general.edit',[$general->id])}}" class="btn btn-sm bg-edit" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
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
   
@endsection