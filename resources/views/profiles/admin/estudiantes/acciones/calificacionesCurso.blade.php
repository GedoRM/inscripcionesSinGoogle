@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection


@section('header')
    @foreach ($calificacionesCurso as $item)
        <h3 class="text-center">{{ $item->nombreMateria }}</h3>
    @endforeach


@endsection

@section('contenido')


    <div class="container">
        <div class="col-md-12 col-sm-8">
            <table class="table table-sm table-bordered nowrap">

                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle">NOMBRE MATERIA</th>
                        <th rowspan="2" style="vertical-align: middle">NOMBRE ALUMNO</th>
                        <th colspan="2" class="text-center">Primer parcial </th>
                        <th colspan="2" class="text-center">Segundo parcial </th>
                        <th colspan="2" class="text-center">Tercer parcial </th>
                        <th colspan="2" class="text-center">Calificación final </th>
                        <th rowspan="2" class="text-center" style="vertical-align: middle">Acciones</th>
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
                    @foreach ($calificacionesCurso as $data)
                        {{ $data->nombreMateria }}
                        <form action="{{ route('actualizarCalificacion', $data->idAlumnoCursoNota) }}" method="post">
                            @method('PUT')
                            @csrf
                            <tr> 
                                <td>{{ $data->nombreMateria }}</td>
                                <td>{{ $data->nombre }}</td>

                                <td><input min="5" max="10" id="nota1" type="text" maxlength="2" name="nota1"
                                        value="{{ $data->nota1 }}" size="3" class="text-center m-auto d-block"
                                        onkeypress="return soloNumeros(event)" style="border: none"></td>
                                <td><input id="falta1" type="text" maxlength="1" name="falta1" value="{{ $data->falta1 }}"
                                        size="3" class="text-center m-auto d-block" onkeypress="return soloNumeros(event)"
                                        style="border: none"></td>
                                <td><input id="nota2" type="text" maxlength="2" name="nota2" value="{{ $data->nota2 }}"
                                        size="3" class="text-center m-auto d-block" onkeypress="return soloNumeros(event)"
                                        style="border: none"></td>
                                <td><input id="falta2" type="text" maxlength="1" name="falta2" value="{{ $data->falta2 }}"
                                        size="3" class="text-center m-auto d-block" onkeypress="return soloNumeros(event)"
                                        style="border: none"></td>
                                <td><input id="nota3" type="text" maxlength="2" name="nota3" value="{{ $data->nota3 }}"
                                        size="3" class="text-center m-auto d-block" onkeypress="return soloNumeros(event)"
                                        style="border: none"></td>
                                <td><input id="falta3" type="text" maxlength="1" name="falta3"
                                        value="{{ $data->falta3 }}" size="3" class="text-center m-auto d-block"
                                        onkeypress="return soloNumeros(event)" style="border: none"></td>
                                <td><input id="notaFinal" type="text" maxlength="2" name="final"
                                        value="{{ $data->notaFinal }}" size="3" class="text-center m-auto d-block"
                                        onkeypress="return soloNumeros(event)" style="border: none"></td>
                                <td><input id="textoFinal" type="text" style="width: 200px" name="letras"
                                        value="{{ $data->letra }}" size="3" class="text-center m-auto d-block"
                                        style="border: none"></td>
                                <td class="text-center"><input type="submit" name="btn{{ $data->idUserCourse }}"
                                        value="Calificar"></td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var nota1 = document.getElementById('nota1').value;
            var nota2 = document.getElementById('nota2').value;
            var nota3 = document.getElementById('nota3').value;
            var final = document.getElementById('notaFinal').value;

            if (nota1 <= 5) {
                document.getElementById('nota1').style.color = "red";
            } else if (nota1 > 5) {
                document.getElementById('nota1').style.color = "black";
            }

            if (nota2 <= 5) {
                document.getElementById('nota2').style.color = "red";
            } else if (nota2 > 5) {
                document.getElementById('nota2').style.color = "black";
            }

            if (nota3 <= 5) {
                document.getElementById('nota3').style.color = "red";
            } else if (nota3 > 5) {
                document.getElementById('nota3').style.color = "black";
            }
            if (final <= 5) {
                document.getElementById('notaFinal').style.color = "red";
            } else if (final > 5) {
                document.getElementById('notaFinal').style.color = "black";
            }

            if (document.getElementById('nota1').value == "") {
                document.getElementById('nota2').disabled = true;
                document.getElementById('falta2').disabled = true;
            } else {
                document.getElementById('nota2').disabled = false;
                document.getElementById('falta2').disabled = false;
            }

            if (document.getElementById('nota2').value == "") {
                document.getElementById('nota3').disabled = true;
                document.getElementById('falta3').disabled = true;
            } else {
                document.getElementById('nota3').disabled = false;
                document.getElementById('falta3').disabled = false;
            }

            if (document.getElementById('nota3').value == "") {
                document.getElementById('notaFinal').disabled = true;
                document.getElementById('textoFinal').disabled = true;
            } else {
                document.getElementById('notaFinal').disabled = false;
                document.getElementById('textoFinal').disabled = false;
            }

            if (document.getElementById('nota1').value != "") {
                document.getElementById('nota1').disabled = true;
                document.getElementById('falta1').disabled = true;
            } else {
                document.getElementById('nota1').disabled = false;
                document.getElementById('falta1').disabled = false;
            }

            if (document.getElementById('nota2').value != "") {
                document.getElementById('nota2').disabled = true;
                document.getElementById('falta2').disabled = true;
            }

            if (document.getElementById('nota3').value != "") {
                document.getElementById('nota3').disabled = true;
                document.getElementById('falta3').disabled = true;
            }

            if (document.getElementById('notaFinal').value != "") {
                document.getElementById('notaFinal').disabled = true;
                document.getElementById('textoFinal').disabled = true;

            }

        });
    </script>
@endsection
