@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
<h1 class="m-0 text-dark"><i class="fas fa-users mr-3"></i>Lista de alumnos</h1>
@endsection

@section('contenido')

<table id="oScroll" class="display table table-bordered nowrap" style="width: 100%"  >
    <thead class="text-center">
        <tr>
            <th>ACCIONES</th>
            <th>ID</th>
            <th>ESTATUS</th>
            <th>NOMBRE (S)</th>
            <th>APELLIDO (S)</th>
            <th>PROGRAMA</th>
            <th>CORREO INSTITUCIONAL</th>
            <th>FECHA</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($student as $students)
        <tr>
            <td class="text-center">
                <a href="{{route('academy.infoStudent', $students->idAlumno)}}"><button class="btn btn-warning btn-sm" title="Ver"><i class="fas fa-eye" style="color:white"></i></i></button></a>
                <a href="{{route('pagos', $students->idAlumno)}}"><button class="btn btn-success btn-sm" title="Pagos"><i class="fas fa-hand-holding-usd" style="color: white"></i></button></a>
                <a href="{{route('viewCalificaciones', $students->idAlumno)}}"> <button class="btn btn-info btn-sm" title="Calificaciones"><i class="fas fa-clipboard-list"></i></button></a>
            </td> 
            <td>{{$id= $students->idAlumno}}</td>    
            <td id="estatus">{{$students->nombreEstatus}}</td>
            <td>{{$students->nombre}}</td>
            <td>{{$students->apePaterno}} {{$students->apeMaterno}} </td>
            <td>{{$students->nombrePrograma}}</td>
            <td>{{$students->correoInstitucional}}</td>
            <td>{{$students->fechaRegistro}}</td>
            
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
    <script src={{asset('js/dataTable.js')}}></script>

@endsection