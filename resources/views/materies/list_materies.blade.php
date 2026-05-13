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
  
<button class="btn btn-success btn-sm" data-target="#modalNewMaterie" data-toggle="modal">
    <i class="fas fa-plus mr-3"></i>Añadir nueva materia
</button>
<br><br>
<table id="oScroll" class="display table table-bordered nowrap" style="width: 100%; word-break: break-all" >
    <thead class="text-center">
        <tr>
            <th>CLAVE</th>
            <th>NOMBRE</th>
            <th>CRÉDITOS</th>
            <th>LICENCIATURA</th>
            <th>MODALIDAD</th>
            <th>CUATRIMESTRE</th>
            <th>ACCIONES</th>
            
            
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($list_materias as $materias)
            <tr>
                <td>{{$materias->claveMateria}}</td>
                <td class="text-left">{{$materias->nombreMateria}}</td>
                <td>{{$materias->creditos}}</td>
                <td>{{$materias->nombrePrograma}}</td>
                <td>{{$materias->nombreModalidad}}</td>
                <td>{{$materias->numeroCuatrimestre}}</td>
                <td>
                <button class="btn btn-warning btn-sm"><i class="fas fa-pen" style="color:white" data-toggle="modal" data-target="#modalEditMaterie{{$materias->idMateria}}">
                    </i>
                </button> 
            <div class="modal fade" id="modalEditMaterie{{$materias->idMateria}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <form action={{route('update.materie', $materias->idMateria)}} method="post">
                            @csrf
                            @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header text-center" >
                            <h4 class="modal-title w-100 font-weight-bold" style="word-break:break-all">Editar</h4>
                                
                            </div>
                            <div class="modal-body mx-3 text-left">
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Nombre de la materia</label>
                                    <input type="text" class="form-control validate" name="nombreMateria"
                                     value="{{$materias->nombreMateria}}">
                                </div>
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Clave de la materia</label>
                                    <input type="text" class="form-control validate" name="claveMateria" value="{{$materias->claveMateria}}">
                                </div>
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Créditos de la materia</label>
                                    <input type="text" class="form-control validate" name="creditosMateria" value="{{$materias->creditos}}">
                                </div>
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Licenciatura</label><br>
                                    <select name="programa" class="browser-default custom-select"> 
                                    <option value="{{$materias->idPrograma}}"> {{$materias->nombrePrograma}}</option>
                                        @foreach ($list_lic as $item)
                                    <option value="{{$item->idPrograma}}">{{$item->nombrePrograma}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Sistema</label><br>
                                    <select name="modalidad" class="browser-default custom-select">
                                    <option value="{{$materias->idModalidad}}">{{$materias->nombreModalidad}}</option>
                                        @foreach ($list_sistema as $item)
                                    <option value="{{$item->idModalidad}}">{{$item->nombreModalidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right">Cuatrimestre</label><br>
                                    <select name="cuatrimestre" class="browser-default custom-select">
                                    <option value="{{$materias->idCuatrimestre}}">{{$materias->numeroCuatrimestre}}</option>
                                        @foreach ($list_cuatri as $item)
                                    <option value="{{$item->idCuatrimestre}}">{{$item->numeroCuatrimestre}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                         
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                
                </td>
            </tr>
       @endforeach
    </tbody>
</table>
 



<div class="modal fade" id="modalNewMaterie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action={{route('addMateries')}} method="post">
            @csrf
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Añadir nueva materia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Nombre de la materia</label>
                <input type="text" id="defaultForm-email" class="form-control validate" name="nombreMateria">
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-input">Clave de la materia</label>
                    <input type="text" id="defaultForm-email" class="form-control validate" name="claveMateria">
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right">Créditos de la materia</label>
                    <input type="text" class="form-control validate" name="creditosMateria" >
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Licenciatura</label><br>
                    <select name="licenciatura" id="" class="browser-default custom-select">
                        @foreach ($list_lic as $item)
                    <option value="{{$item->idPrograma}}">{{$item->nombrePrograma}}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Sistema</label>
                    <select name="modalidad" id="" class="browser-default custom-select">
                        @foreach ($list_sistema as $item)
                    <option value="{{$item->idModalidad}}">{{$item->nombreModalidad}}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Cuatrimestre</label>
                    <select name="cuatrimestre" id="" class="browser-default custom-select">
                        @foreach ($list_cuatri as $item)
                    <option value="{{$item->idCuatrimestre}}">{{$item->numeroCuatrimestre}}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-sm">Añadir</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src={{asset('js/dataTable.js')}}></script>
@endsection