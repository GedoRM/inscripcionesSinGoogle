@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
<h1 class="m-0 text-dark"><i class="fas fa-users mr-3"></i>Lista de alumnos</h1>
@endsection

@section('contenido')

@if (session('cambio'))
<div class="col-md-6">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('cambio')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
@if (session('noCambio'))
<div class="col-md-6">
  <div class="alert alert-light alert-dismissible fade show" role="alert">
    {{session('noCambio')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif

<table id="wScroll" class="display table table-bordered nowrap" style="width: 100%"  >
    <thead class="text-center">
        <tr>
            <th>ACCIONES</th>
            <th>ID</th>
            <th>ESTATUS</th>
            @can('Administrador')
            <th>ASESOR</th>
            @endcan
            <th>NOMBRE (S)</th>
            <th>APELLIDO (S)</th>
            <th>PROGRAMA</th>
            <th>CORREO INSTITUCIONAL</th>
            @can('Administrador')
            <th>TÉRMINOS Y <br>CONDICIONES</th>
            <th>CARTA <br> COMPROMISO</th>
            @endcan
            <th>FECHA</th>
            
        </tr>
    </thead>
    <tbody class="">
        @foreach ($student as $students)
        <tr>
            <td class="text-center">
                <a href="{{route('viewInfo', $students->idAlumno)}}"><button class="btn btn-warning btn-sm" title="Editar"><i class="fas fa-pen" style="color:white"></i></button></a>
                <a href="{{route('pagos', $students->idAlumno)}}"><button class="btn btn-success btn-sm" title="Pagos"><i class="fas fa-hand-holding-usd" style="color: white"></i></button></a>
                <a href="{{route('viewCalificaciones', $students->idAlumno)}}"> <button class="btn btn-info btn-sm" title="Calificaciones"><i class="fas fa-clipboard-list"></i></button></a>
                @can('Administrador')
                <button class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                @endcan
            </td>
            <td>
                <a class="btn" data-target="#changeStatus" data-toggle="modal">
                    {{$id= $students->idAlumno}}
                </a>
                @can('Administrador')
                <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{route('updateStatus', $id)}}" method="post">
                            @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Cambiar datos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <div class="md-form mb-5">
                                    <label for="">ID del alumno</label>
                                    <input type="text" value="{{$students->idAlumno}}" name="idAlumno" class="form-control validate">
                                </div>
                                <div class="md-form mb-5">
                                    <label for="">Estatus del alumno</label><br>
                                    <select class="browser-default custom-select" name="estatus" id="">
                                        <option value="{{$students->idEstatusAlumno}}" disabled selected>Selecciona un estatus</option>
                                        <option value="{{$students->idEstatusAlumno}}" selected hidden>{{$students->nombreEstatus}}</option>
                                        @foreach ($estatus as $estatus)
                                            <option value="{{$estatus->idEstatusAlumno}}">{{$estatus->nombreEstatus}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-form mb-5">
                                    <label for="">Asesor del alumno</label><br>
                                    <select class="browser-default custom-select" name="" id="">
                                        <option value="" disabled>Selecciona un asesor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-sm">Guardar cambios</button>
                            </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
                @endcan
            
            </td>
            
            <td id="estatus">{{$students->nombreEstatus}}</td>
            @can('Administrador')
            <td style="text-align:center; border-left:1px solid #dee2e6">{{$students->idAsesores}}</td>
            @endcan
            <td>{{$students->nombre}}</td>
            <td>{{$students->apePaterno}} {{$students->apeMaterno}} </td>
            <td>{{$students->nombrePrograma}}</td>
            <td>{{$students->correoInstitucional}}</td>
            @can('Administrador')
                
            <td class="text-center">{{$students->termyCond}}</td>
            <td class="text-center">{{$students->cartaCompromiso}}</td>
            @endcan
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