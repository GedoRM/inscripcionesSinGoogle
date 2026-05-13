@extends('layouts.adminlte')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
<h1 class="m-0 text-dark"><i class="far fa-list-alt mr-3"></i>Cursos Asignados</h1>
@endsection

@section('contenido')




    <table id="wScroll" class="display table nowrap table-bordered" style="width: 100%">
        <thead class="text-center">
            <tr>
                <th>CLAVE DE LA MATERIA</th>
                <th>NOMBRE DE LA MATERIA</th>
                <th>CUATRIMESTRE</th>
                <th>PROGRAMA</th>
                <th>MODALIDAD</th>
                <th>STATUS</th>
                <th>FECHA INICIO</th>
                <th>FECHA FINAL</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
@foreach ($maestroCurso as $item)
    <tr>
        <td class="text-center">{{$item->claveMateria}}</td>
        <td>{{$item->nombreMateria}}</td>
        <td class="text-center">{{$item->numeroCuatrimestre}}</td>
        <td class="text-center">{{$item->nombrePrograma}}</td>
        <td class="text-center">{{$item->nombreModalidad}}</td>
        <td class="text-center">{{$item->status}}</td>
        <td class="text-center">{{$item->fecha_inicio}}</td>
        <td class="text-center">{{$item->fecha_final}}</td> 
        <td class="text-center">
            <a href="{{route('actaCurso', ['idDocente' => $id, 'idCurso' => $item->idCurso])}}">
                <button class="btn btn-primary" title="Generar Acta">
                    <i class="fas fa-clipboard-list"></i>
                </button>
            </a>
            <a href="{{route('inscritosCurso', ['idDocente' => $id, 'idCurso' => $item->idCurso])}}">
                <button class="btn btn-primary" title="Calificaciones">
                    <i class="fas fa-clipboard-list"></i>
                </button>
            </a>
        </td>
        
    </tr>
@endforeach
        </tbody>


    </table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset('js/dataTable.js') }}></script>
@endsection
