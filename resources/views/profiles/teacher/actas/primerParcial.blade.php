@extends('layouts.adminlte')
<?php
use Luecano\NumeroALetras\NumeroALetras;
?>
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

@endsection

@section('header')
    <h3><i class="fas fa-file-signature mr-3"></i>Acta de curso</h3>

@endsection

@section('contenido')
    @if (session('mensajeCorrecto'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensajeCorrecto') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif
    @if (session('mensajeError'))
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('mensajeError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-sm">
                <thead class="text-center">
                    <tr>
                        <th style="width:10%"><strong> GRUPO</strong></th>
                        <th style="width:10%"><strong>CICLO</strong></th>
                        <th style="width:10%"><strong>PLAN</strong></th>
                        <th colspan="3" class="text-center"><strong>CATEDRATICO</strong></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        @foreach ($detallesMateria as $item)
                            <td>{{ $item->nombreGrupo }}</td>
                            <td></td>
                            <td>{{ $item->nombreModalidad }}</td>
                            <td colspan="3">{{ $item->name }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2"><strong>LICENCIATURA</strong></td>
                        @foreach ($detallesMateria as $item)
                            <td colspan="3">{{ $item->nombrePrograma }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2"><strong>ASIGNATURA</strong></td>
                        @foreach ($detallesMateria as $item)
                            <td colspan="2">{{ $item->nombreMateria }}</td>
                        @endforeach
                        <td>Exámen primer parcial</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <table class="table table-sm table-bordered nowrap w-100">

                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: top">No.</th>
                        <th rowspan="2" style="vertical-align: top"> MATRÍCULA</th>
                        <th rowspan="2" style="vertical-align: top">NOMBRE ALUMNO</th>
                        <th colspan="5">SESIONES ASISTENCIA</th>
                        <th colspan="4">INTEGRACIÓN DE CALF. POR FORMA DE EVALUAR</th>
                        <th colspan="2" class="text-center">CALIFICACIÓN FINAL </th>
                        <th rowspan="2" class="text-center" style="vertical-align: top">ACCIÓN</th>
                    </tr>
                    <tr>
                        <th colspan="1">1</th>
                        <th colspan="1">2</th>
                        <th colspan="1">3</th>
                        <th colspan="1">4</th>
                        <th colspan="1">AS</th>
                        <th colspan="1">IN</th>
                        <th colspan="1">PA</th>
                        <th colspan="1">EP</th>
                        <th colspan="1">CF</th>
                        <th colspan="1" class="text-center">No.</th>
                        <th colspan="1" class="text-center">LETRA</th>
                    </tr>
                </thead>

                <tbody class="">
                    @foreach ($inscritosCurso as $data)
                        <?php $cont = 1; ?>

                        <tr>
                            <form action="{{ route('actualizarCalificacion', $data->idAlumnoCursoNota) }}" method="post">
                                @method('PUT')
                                @csrf
                                <td>{{ $cont }}</td>
                                <td class="text-center"> {{ $data->idAlumno }}</td>
                                <td>{{ $data->apePaterno . ' ' . $data->apeMaterno . ' ' . $data->nombre }}</td>
                                
                                <td>
                                    <input type="checkbox" value="1" name="AS1" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="AS2" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="AS3" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="AS4" size="1" style="border: none">
                                </td>
                                <td>
                                    <input onkeypress="return soloNumeros(event)"
                                        style="display: block; margin:auto; width:20px; text-align:center" type="text"
                                        min="1" max="4" maxlength="1" name="AS" size="1">
                                </td>
                                <td>
                                    <input type="text" class="text-center m-auto d-block" name="in" maxlength="4" size="1">
                                </td>
                                <td>
                                    <input type="text" class="text-center m-auto d-block" name="pa" maxlength="4" size="1">
                                </td>
                                <td>
                                    <input type="text" class="text-center m-auto d-block" name="ep" maxlength="4" size="1">
                                </td>
                                <td>
                                    <input type="text" class="text-center m-auto d-block" name="cf" maxlength="4" size="2">
                                </td>
                                <td class="text-center">{{ $data->nota1 }}</td>
                                <?php
                                $formatter = new NumeroALetras();
                                $formatter->conector = 'punto';
                                $letra = strtolower($formatter->toString($data->nota1));
                                ?>
                                @if ($letra = "cero")
                                    <td class="text-center"></td>
                                @else
                                    <td class="text-center">{{ $letra }}</td>
                                @endif

                                <td class="text-center">
                                    @if ($data->nota1 != null)
                                        <input type="submit" name="primer" class="btn btn-primary" value="Calificar"
                                            disabled>
                                    @else
                                        <input type="submit" name="primer" class="btn btn-primary" value="Calificar">
                                    @endif

                                </td>

                            </form>
                        </tr>
                        <?php $cont++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset('js/dataTable.js') }}></script>

    <script>
        $()
    </script>
@endsection
