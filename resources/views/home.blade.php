@extends('layouts.adminlte')



@section('contenido')
@if (session('cambioCorrecto'))
<div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('cambioCorrecto') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

</div>
@endif

    @can('Sin asignar')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('images/logo_itec.png') }}" class="img-fluid pb-4" style="width:40%" alt="">
                        <h2>Bienvenido al Sistema de Administración y Control de Información </h2>
                    </div>
                    <br><br><br>
                </div>

                <div class="col-md-8 d-block m-auto">
                    <div class="text-justify">

                        <h3>
                            Gracias por completar tu registro. Ahora, por favor comunicate al área de
                            <strong>servicios escolares</strong>
                            de Itec Magistratus para que se de de alta a tu perfil y puedas continuar con tu proceso de
                            registro. Gracias
                            <br><br>

                            </h2>

                    </div>
                </div>
            </div>
        </div>
    @endcan
    @if (Auth::user()->forcePass == true)
        @include('profiles.cambiarPass')
    @endif

    @can('Administrador')
        @include('profiles.admin.main')
    @endcan

    @can('Alumno')
        @include('profiles.students.main')
    @endcan

    @can('Administrativo')
        @include('profiles.academy.main')
    @endcan

    @can('Docente')
        @include('profiles.teacher.main')
    @endcan

@endsection

@section('js')
    

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
                $("#ver").removeClass("fa-eye-slash");
                $("#ver").addClass("fa-eye");

            }else{
                tipo.type = "password";
                $("#ver").removeClass("fa-eye");
                $("#ver").addClass("fa-eye-slash");
            }
        }
      </script>
@endsection
