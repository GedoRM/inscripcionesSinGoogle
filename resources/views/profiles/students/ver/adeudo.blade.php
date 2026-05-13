@extends('layouts.adminlte')

@section('css')
    <style>
        .table{
            filter:blur(5px);
        }
    </style>
@endsection

@section('header')
<h3><i class="far fa-list-alt mr-3"></i>Calificaciones parciales</h3>
@endsection

@section('contenido')
<div class="modal"tabindex="-1" style="min-height:100vh; display: block; padding-top:5%; position: absolute;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
              <h2 style="color:orange" >
                  <i class="fas fa-exclamation-triangle fa-2x mr-3"></i>
          <br><br>
          ADVERTENCIA</h5>
          </div>
          <hr>
            <div class="text-justify m-4">
              <h4>Para poder consultar tus calificaciones debes cubrir todas las cuotas</h4>
            </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <div class="container">
    
    <table class="table table-sm table-bordered nowrap">

        <thead>
            <tr>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">NOMBRE MATERIA</th>
                <th colspan="2" class="text-center">Primer parcial </th>
                <th colspan="2" class="text-center">Segundo parcial </th>
                <th colspan="2" class="text-center">Tercer parcial </th>
                <th colspan="2" class="text-center">Calificación final </th>
            </tr>
            <tr>
                <th colspan="1" class="text-center">Calif</th>
                <th colspan="1" class="text-center">Faltas</th>
                <th colspan="1" class="text-center">Calif</th>
                <th colspan="1" class="text-center">Faltas</th>
                <th colspan="1" class="text-center">Calif</th>
                <th colspan="1" class="text-center">Faltas</th>
                <th colspan="1" class="text-center">Número</th>
                <th colspan="1" class="text-center">Letras</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($calificacionesParciales as $data)
                <tr>
                    <td>{{ $data->nombreMateria }}</td>

                    <td>
                        <label for=""></label>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                    <td>
                        <label for="">/label>
                    </td>
                    <td><label for=""></label>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
