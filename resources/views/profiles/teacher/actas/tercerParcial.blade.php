@extends('layouts.adminlte')

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
                        <th class="text-center"><strong>CATEDRATICO</strong></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        @foreach ($detallesMateria as $item)
                            <td>{{ $item->nombreGrupo }}</td>
                            <td></td>
                            <td>{{ $item->nombreModalidad }}</td>
                            <td>{{ $item->name }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2"><strong>LICENCIATURA</strong></td>
                        @foreach ($detallesMateria as $item)
                            <td colspan="2">{{ $item->nombrePrograma }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2"><strong>ASIGNATURA</strong></td>
                        @foreach ($detallesMateria as $item)
                            <td colspan="2">{{ $item->nombreMateria }}</td>
                        @endforeach
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <table class="table table-sm table-bordered nowrap">

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

                <tbody class="text-center">
                    @foreach ($inscritosCurso as $data)
                    <?php $cont = 1; ?>

                        <tr>
                            <form action="{{ route('actualizarCalificacion', $data->idAlumnoCursoNota) }}" method="post">
                                @method('PUT')
                                @csrf
                                <td>{{$cont}}</td>
                                <td class="text-center"> {{ $data->idAlumno }}</td>
                                <td>{{ $data->apePaterno . ' ' . $data->apeMaterno . ' ' . $data->nombre }}</td>

                                <td>
                                    <input type="checkbox" value="" name="" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="" size="1" style="border: none">
                                </td>
                                <td>
                                    <input type="checkbox" value="" name="" size="1" style="border: none">
                                </td>
                                <td>
                                    <input onkeypress="return soloNumeros(event)" type="text" name="" value=""
                                        style="border: none" size="1">
                                </td>
                                <td>
                                    <input onkeypress="return soloNumeros(event)" type="text" name="" value=""
                                        style="border: none" size="1">
                                </td>
                                <td>
                                    <input onkeypress="return soloNumeros(event)" type="text" name="" value=""
                                        style="border: none" size="1">
                                </td>
                                <td>
                                    <input onkeypress="return soloNumeros(event)" type="text" name="" value=""
                                        style="border: none" size="1">
                                </td>
                                <td></td>
                                <td></td>

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
@endsection
