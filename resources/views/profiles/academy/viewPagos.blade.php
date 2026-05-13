@foreach ($user as $item)
    
@extends('layouts.adminlte')

@section('header')

    <h1><i class="fas fa-money-bill-alt mr-2"></i> Registro de pagos de <strong>{{$item->nombre ." ".$item->apePaterno ." ". $item->apeMaterno}} </strong></h1>
@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <style>
        #head{
            font-weight: 600;
            border-bottom: 2px solid;
            border-bottom-color: #d23907;  
        }

        input.descripcion {
            text-transform: capitalize;
        }
    </style>
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

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegistroPago">
    Registrar pago
</button>
<!-- Modal -->
<div class="modal fade" id="modalRegistroPago" tabindex="-1" aria-labelledby="modalRegistroPago" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('addPago', $item->idAlumno)}}" method="post">
            @csrf
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="moda-title" id="modalRegistroPago">Registrar nuevo pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                    <div class="modal-body mx-3 text-left">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right">Concepto</label>
                            <select name="concepto" id="" class="browser-default custom-select">
                                <option value="" disabled selected>Selecciona un concepto de pago</option>
                                @foreach ($conceptos as $item)
                                    <option value="{{$item->idConcepto}}">{{$item->nombreConcepto}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right">Cantidad</label>
                            <input type="text" class="form-control validate" name="cantidad" placeholder="$">
                        </div>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right">Estatus</label>
                            <select name="estatus" id="" class="browser-default custom-select">
                                <option value="" disabled selected>Selecciona un estatus de pago</option>
                                @foreach ($estatusPago as $item)
                                    <option value="{{$item->idEstatusPago}}">{{$item->estatusPago}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right">Descripcion</label>
                            <input type="text" class="form-control validate descripcion" name="descripcion">
                        </div>
                    </div>
                
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-success">Registrar pago</button>
                </div>
        </div>
         </form>
    </div> 
</div>

    <table class="table text-center table-striped">
        <thead>
            <th id="head">Concepto</th>
            <th id="head">Cantidad</th>
            <th id="head">Estatus</th>
            <th id="head">Fecha</th>
            <th id="head">Descripcion</th>
            <th id="head">Acciones</th>
        </thead>
        <tbody>
            @foreach ($pagos as $registro)
            <tr>
                <td>{{$registro->nombreConcepto}}</td>
                <td>MXN ${{$registro->cantidad}}</td>
                @if ($registro->estatusPago == "Pendiente")
                    <td style="color: orange">{{$registro->estatusPago}}</td>
                @elseif($registro->estatusPago == "Pagado")
                    <td style="color: green">{{$registro->estatusPago}}</td> 
                @endif
                <td>{{$registro->fechaCaptura}}</td>
                <td>{{$registro->descripcion}}</td>
                <td><button class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@endsection
@endforeach