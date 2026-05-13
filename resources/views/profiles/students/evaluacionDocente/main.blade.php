@extends('layouts.adminlte')

@section('header')
    
@endsection

@section('css')
    
@endsection

@section('contenido')
    <div class="container">
        <div class="text-center">
            <h4>Iniciar evaluación docente</h4>
            <a href="{{route('pregunta1', Crypt::encrypt($id))}}"><button class="btn btn-primary btn-sm">Iniciar</button></a>
        </div>
    </div>
@endsection

@section('js')
    
@endsection