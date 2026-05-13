@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
    <h3><i class="fas fa-users mr-3"></i>Alumnos inscritos</h3>

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
        <div class="col-md-4">
            @foreach ($detallesMateria as $item)
                <h5>Programa: {{ $item->nombreMateria }}</h5>
                <h5>Modalidad: {{ $item->nombreModalidad }}</h5>
                <h5>Cuatrimestre: {{ $item->numeroCuatrimestre }}</h5>
            @endforeach
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <table id="Scroll" class="table table-sm table-bordered nowrap">

                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: middle"> MATRÍCULA</th>
                        <th rowspan="2" style="vertical-align: middle">NOMBRE ALUMNO</th>
                        <th colspan="2" class="text-center">PRIMER PARCIAL </th>
                        <th colspan="2" class="text-center">SEGUNDO PARCIAL </th>
                        <th colspan="2" class="text-center">TERCER PARCIAL </th>
                        <th colspan="2" class="text-center">CALIFICACIÓN FINAL </th>
                        <th rowspan="2" class="text-center" style="vertical-align: middle">ACCIONES</th>
                    </tr>
                    <tr>
                        <th colspan="1" class="text-center">CALIFICACIÓN</th>
                        <th colspan="1" class="text-center">FALTAS</th>
                        <th colspan="1" class="text-center">CALIFICACIÓN</th>
                        <th colspan="1" class="text-center">FALTAS</th>
                        <th colspan="1" class="text-center">CALIFICACIÓN</th>
                        <th colspan="1" class="text-center">FALTAS</th>
                        <th colspan="1" class="text-center">NÚMERO</th>
                        <th colspan="1" class="text-center">LETRAS</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($inscritosCurso as $data)

                        <tr>
                            <form action="{{ route('actualizarCalificacion', $data->idAlumnoCursoNota) }}" method="post">
                                @method('PUT')
                                @csrf
                                <td class="text-center"> {{ $data->idAlumno }}</td>
                                <td>{{ $data->apePaterno . ' ' . $data->apeMaterno . ' ' . $data->nombre }}</td>

                                <td>
                                    @if ($data->nota1 == null)
                                        <input min="5" max="10" id="nota1" type="text" maxlength="2" name="nota1"
                                            value="{{ $data->nota1 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        @if ($data->nota1 <= '5')
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:red">{{ $data->nota1 }}</label>
                                        @else
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:black">{{ $data->nota1 }}</label>
                                        @endif
                                    @endif
                                </td>

                                <td>
                                    @if ($data->falta1 == null)
                                        <input id="falta1" type="text" maxlength="1" name="falta1"
                                            value="{{ $data->falta1 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        <label type="text" class="text-center m-auto d-block"
                                            style="border: none; color:black">{{ $data->falta1 }}</label>
                                    @endif
                                </td>

                                <td>
                                    @if ($data->nota2 == null && $data->nota1 != null)
                                        <input id="nota2" type="text" maxlength="2" name="nota2"
                                            value="{{ $data->nota2 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        @if ($data->nota2 <= '5')
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:red">{{ $data->nota2 }}</label>
                                        @else
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:black">{{ $data->nota2 }}</label>
                                        @endif
                                    @endif
                                </td>

                                <td>
                                    @if ($data->falta2 == null && $data->falta1 != null)
                                        <input id="falta2" type="text" maxlength="1" name="falta2"
                                            value="{{ $data->falta2 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        <label type="text" class="text-center m-auto d-block"
                                            style="border: none; color:black">{{ $data->falta2 }}</label>
                                    @endif
                                </td>

                                <td>
                                    @if ($data->nota3 == null && $data->nota2 != null)
                                        <input id="nota3" type="text" maxlength="2" name="nota3"
                                            value="{{ $data->nota3 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        @if ($data->nota3 <= '5')
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:red">{{ $data->nota3 }}</label>
                                        @else
                                            <label type="text" class="text-center m-auto d-block"
                                                style="border: none; color:black">{{ $data->nota3 }}</label>
                                        @endif
                                    @endif

                                </td>

                                <td>
                                    @if ($data->falta3 == null && $data->falta2 != null)
                                        <input id="falta3" type="text" maxlength="1" name="falta3"
                                            value="{{ $data->falta3 }}" size="3" class="text-center m-auto d-block"
                                            onkeypress="return soloNumeros(event)" >
                                    @else
                                        <label type="text" class="text-center m-auto d-block">{{ $data->falta3 }}</label>
                                    @endif

                                </td>

                                <td>@if ($data->notaFinal <= '5')
                                    <label class="text-center m-auto d-block" style="color:red">{{ $data->notaFinal }}</label>
                                @else
                                <label class="text-center m-auto d-block">{{ $data->notaFinal }}</label>
                                @endif
                                    
                                </td>
                                <td>
                                    <label class="text-center m-auto d-block">{{ $data->letra }}</label>
                                </td>
                                <td class="text-center">
                                    @if ($valor == '1' && $data->notaFinal == null)
                                        <input type="submit" class="btn btn-success" name="btn{{ $data->idUserCourse }}"
                                            value="Calificar">
                                    @else
                                        <button disabled type="button" class="btn btn-success" name="">Calificar</button>
                                    @endif
                                </td>
                            </form>
                        </tr>
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
