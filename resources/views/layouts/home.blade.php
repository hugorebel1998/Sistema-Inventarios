<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('title', 'Sistama de inventario')
    <title> @yield('title') | CMS</title>

    <!--Fuentes -->
    {{-- <link rel="stylesheet" href="{{ asset('css/fuente.css') }}"> --}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/sitio.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
     <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
    @toastr_css
</head>

<body class="hold-transition sidebar-collapsed">
    <div class="wrapper">
       {{-- @include('sweetalert::alert')--}}

        <nav class="main-header navbar navbar-expand navbar-dark navbar-indigo">

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ url('/') }}" class="nav-link text-white"><i class="fas fa-home"></i>
                        Inicio</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#">
                        <span class="mr-2"><b> {{ Auth::user()->perfil}} |</b></span>
                        <span class="mr-2"><b>Perfil</b></span>
                        <i class="fas fa-user-shield"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="text-center mt-3">
                             <b>{{ auth()->user()->name }} {{ auth()->user()->apellido_p }} {{ auth()->user()->apellido_m }} </b>
                        </p>
                        <span class="dropdown-header">{{ auth()->user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <a href="" class="dropdown-item">
                          <i class="fas fa-user-edit"></i> Mi perfil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href=""
                            class="dropdown-item">
                            <i class="fas fa-unlock-alt"></i> Cambiar contraseña
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-indigo elevation-4">
            <a href="" class="brand-link navbar-white pl-3">
                <img class="mx-auto d-block" src="{{ asset('img/laravel.png') }}" alt="Habanero House"
                    width="150">               
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (is_null(auth()->user()->imagen_usuario))
                        <img src="{{ asset('img/users/sin_asignar/foto.png') }}" alt="{{auth()->user()->name}}"
                        class="img-circle elevation-4" style="opacity: .9; height:50px; width:50px">
                        @else
                        <img src="{{ asset('img/users/'. auth()->user()->imagen_usuario) }}" alt="User Image"
                        class="img-circle elevation-4" style="opacity: .9; height:50px; width:50px">
                        @endif
                    </div>
                    <div class="info mt-2">
                        <a href=""
                            class="text-primary">
                            {{ auth()->user()->name }} {{ auth()->user()->apellido_p }}
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-laptop-house"></i>
                                <p>
                                    Administración
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                               

                                <li class="nav-item">
                                    <a href="{{ route('proveedores.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-truck nav-icon"></i>
                                        <p class="text-black">Proveedores</p>
                                    </a>
                                </li>

                                
                                
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-user-friends nav-icon"></i>
                                        <p class="text-black">Usuarios</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('colaboradores.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p class="text-black">Colaboradores</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('clientes.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-child nav-icon"></i>
                                        <p class="text-black">Clientes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Inventario
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('categorias.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-tags nav-icon"></i>
                                        <p class="text-black">Categorias</p>
                                    </a>
                                </li>

                                 
                                <li class="nav-item">
                                    <a href="{{ route('unidades.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-bars nav-icon"></i>
                                        <p class="text-black">Unidades medida</p>
                                    </a>
                                </li> 
                               
                                <li class="nav-item">
                                    <a href="{{ route('productos.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-boxes nav-icon"></i>
                                        <p class="text-black">Productos</p>
                                    </a>
                                </li>  
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-funnel-dollar"></i>
                                <p>
                                    Denominaciones
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('denominaciones.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-coins nav-icon"></i>
                                        <p class="text-black">Monedas</p>
                                    </a>
                                </li>              

                            </ul>
                        </li> 
                        
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-sliders-h"></i>
                                <p>
                                    Ajustes
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{ route('general.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-tools nav-icon"></i>
                                        <p class="text-black">Geneal</p>
                                    </a>
                                </li>              

                            </ul>
                        </li> 
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="content-wrapper portada">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Laboratorio</h1>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


        <footer class="main-footer">

            <div class="text-center">
                <p>&copy; <?= date('Y') ?> <strong>CMS </strong> .</p>
            </div>
        </footer>
    </div>



    
    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>   
    <!-- TableJS -->
    <script src="{{ asset('js/table.js') }}"></script>
    <!--Select2JS-->
    <script src="{{ asset('js/select2.js') }}"></script>

    


    <script>
        $(function() {
            bsCustomFileInput.init();

               // Summernote
           $('#summernote').summernote()
  
        });
    </script>




    <!-- Page specific script -->

    {{-- AlertConfirmt --}}
    @yield('alerta')

    @toastr_js
    @toastr_render

</body>

</html>