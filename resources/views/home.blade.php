@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="small-box bg-indigo">
                    <div class="small-box bg-indigo shadow">
                        <div class="inner">
                            @if (Auth::check())
                                
                            <h6>{{ auth()->user()->perfil}}</h6>
                            <h4 id="tittlehome" class="mt-4">Bienvenido 
                                <b id="tittlehomesub">
                                    {{ auth()->user()->name }} {{ auth()->user()->apellido_p}} {{ auth()->user()->apellido_m}}
                                 </b>
                            </h4>
                                    <h4 id="tittledescripcion" class="mt-4 mb-4">Que haremos HOY !!!</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie mt-4"></i>
                        </div>
                        {{-- <a href="{{ url('/') }}" class="small-box-footer"><i class="fas fa-pepper-hot"></i></i></a> --}}
                        <a href="#" class="small-box-footer"><i class="fas fa-pepper-hot"></i></i></a>
                        @endif
                    </div>

                   
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3></h3>
                                <p>Proveedores</p>
                            </div>
                            <div class="icon">
                                {{-- <i class="ion ion-bag"></i> --}}
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <a href="" class="small-box-footer">Ir <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3></h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                {{-- <i class="ion ion-bag"></i> --}}
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="" class="small-box-footer">Ir <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3></h3>
                                <p>Categorias</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-sort-amount-up"></i>
                            </div>
                            <a href="" class="small-box-footer">Ir <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3></h3>

                                <p>Productos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection