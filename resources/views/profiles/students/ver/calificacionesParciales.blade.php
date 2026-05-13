@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
    <h3><i class="far fa-list-alt mr-3"></i>Calificaciones parciales</h3>
@endsection

@section('contenido')
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
                    <tr class="text-center">
                        <td class="text-left">{{ $data->nombreMateria }}</td>

                        <td>
                            @if ($data->nota1 <= 5)
                                <label style="color:Red">{{ $data->nota1 }}</label>
                            @else
                                <label>{{ $data->nota1 }}</label>
                            @endif
                        </td>
                        <td>
                            <label>{{ $data->falta1 }}</label>
                        </td>
                        <td>
                            @if ($data->nota2 <= 5)
                                <label style="color:Red">{{ $data->nota2 }}</label>
                            @else
                                <label>{{ $data->nota2 }}</label>
                            @endif

                        </td>
                        <td>
                            <label>{{ $data->falta2 }}</label>
                        </td>
                        <td>
                            @if ($data->nota3 <= 5)
                                <label style="color:Red">{{ $data->nota3 }}</label>
                            @else
                                <label>{{ $data->nota3 }}</label>
                            @endif
                        </td>
                        <td><label>{{ $data->falta3 }}</label>
                        </td>
                        <td>
                            @if ($data->notaFinal <= 5)
                                <label style="color:Red">{{ $data->notaFinal }}</label>
                            @else
                                <label>{{ $data->notaFinal }}</label>
                            @endif
                        </td>
                        <td>
                            <label>{{ $data->letra }}</label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@endsection
