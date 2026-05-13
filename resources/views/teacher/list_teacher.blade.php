@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('header')
    
@endsection

@section('contenido')

@if (session('mensaje'))
<div class="col-md-6">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
 

<br><br>
<table id="example" class="display table table-bordered nowrap" style="width: 100%; word-break: break-all" >
    <thead class="text-center">
        <tr>
            <th>NOMBRE</th>
            <th>CORREO INSTITUCIONAL</th>
            <th>ESTATUS</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($list_teacher as $datoDocente)
            <tr>  
                <td>{{$datoDocente->name}}</td>
                <td>{{$datoDocente->email}}</td>
                <td>{{$datoDocente->status}}</td>
                
                
            </tr>
       @endforeach
    </tbody>
</table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src={{asset('js/dataTable.js')}}></script>
@endsection