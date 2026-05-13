@extends('layouts.adminlte')

@section('css')

@endsection

@section('header')

@endsection


@section('contenido')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pregunta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $item)
                <tr>
                    <td>{{$item->idPregunta}}</td>
                    <td>{{ $item->nombrePregunta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')

@endsection
