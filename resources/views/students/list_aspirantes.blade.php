@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
<h1 class="m-0 text-dark"><i class="fas fa-users mr-3"></i>Lista de aspirantes</h1>
@endsection

@section('contenido')

@if (session('delete'))
<div class="col-md-6">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('delete')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div> 
@endif
<table id="alumno" class="display table nowrap table-bordered" style="width: 100%"  >
    <thead class="text-center">
        <tr>
            <th>ID</th>
            <th>ASESOR</th>
            <th>NOMBRE (S)</th>
            <th>APELLIDO (S)</th>
            <th>PROGRAMA</th>
            <th>E-MAIL</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($student as $students)
        <tr>
            <th>{{$id= $students->idAlumno}}</th>
            <th>{{$students->idAsesores}}</th>
            <th>{{$students->nombre}}</th>
            <th>{{$students->apePaterno}} {{$students->apeMaterno}} </th>
            <th>{{$students->nombrePrograma}}</th>
            <th>{{$students->correoAlumno}}</th>
            <th>{{$students->fechaRegistro}}</th>
            <th class="text-center">
                <div class="row">
                    <a href="{{route('viewInfo', $students->idAlumno)}}"><button class="ml-3 mr-3 btn btn-warning btn-sm" title="Editar"><i class="fas fa-pen" style="color:white"></i></button></a>
                <form action="{{route('deleteAspirante', $students->idAlumno)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                </form>
                </div>
                
            </th>
           </tr>           
        @endforeach
        
    </tbody>
</table>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{asset('js/dataTable.js')}}></script>
@endsection