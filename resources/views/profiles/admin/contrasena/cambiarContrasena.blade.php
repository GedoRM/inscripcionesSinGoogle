@extends('layouts.adminlte')

@section('css')

@endsection

@section('header')
    <h3>Cambiar contraseña a {{$email}}</h3>
@endsection

@section('contenido')
    <div class="container">
        <div class="col-md-6 d-block m-auto">

            <form action="{{route('updatePass', $id)}}" method="post">
                @csrf
                <div class="md-form">
                    <label>Nueva contraseña</label>
                    @if (session('generar'))
                    <input class="form-control" type="text" id="contrasena" name="contrasena" value="{{session('generar')}}">
                    @else
                    <input class="form-control" type="text" id="contrasena" name="contrasena">
                    @endif
                    
                </div>
                <div id="contrasena"></div>
                <br>
                <div class="text-center">
                   
                        <a href="{{route('generar')}}"><button type="button" id="generar" class="btn btn-primary">Generar contraseña</button></a>
                    
                    
                    <input type="submit" class="btn btn-success" value="Guardar cambios">
                    
                </div>
            </form>



        </div>
    </div>
@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@endsection
