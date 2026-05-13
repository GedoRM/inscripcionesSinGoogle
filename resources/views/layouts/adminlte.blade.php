<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="cache-control" content="must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SAYCI</title>
    @yield('css')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css') }}>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">-->

    <link rel="stylesheet" href={{ asset('css/styles.css') }}>
    <!-- Google Font: Source Sans Pro -->
    <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
           
            <ul class="navbar-nav ml-auto mb-3">
                
             
                <!------ Fin de prueba -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">

                        {{ Auth::user()->name }}
                        @if (Auth::user()->avatar != null)
                            <img src="{{ Auth::user()->avatar }}" class="img-circle ml-3 mr-2 img-fluid mb-2"
                                style="width:50px; height:45px" alt="User Image">
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right mt-3 " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}<i class="fas fa-sign-in-alt ml-2"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="background-color:white;">
            <!-- Brand Logo -->
            <a href={{ route('home') }}>
                <img src={{ asset('images/logo_itec.png') }} class="img-fluid mt-4">
                <br>
                <h4 class="text-center">SAYCI</h4>
                <hr>
            </a>


            <!-- Sidebar -->
            @if (Auth::user()->id_status != 1)
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            @can('Administrador')
                                @include('menu.administrador')
                            @endcan
                            @can('Administrativo')
                                @include('menu.administrativo')
                            @endcan
                            @can('Docente')
                                @include('menu.docente')
                            @endcan
                            @can('Alumno')
                                @include('menu.alumno')
                            @endcan
                            <li class="nav-item ml-1">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-pdf mr-2"></i>
                                    <p>
                                        Reportes
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            @endif
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-10">

                            @yield('header')
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="min-height: 100vh">
                                <div class="card-body">
                                    @yield('contenido')

                                </div>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="http://itecmagistratus.edu.mx/">Itec Magistratus</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

    @yield('js')
    <script src={{ asset('plugins/jquery/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('dist/js/adminlte.min.js') }}></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>


    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000); // <-- time in milliseconds
    </script>

    <script type="text/javascript">
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
    </script>

</body>

</html>
