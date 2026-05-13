@extends('layouts.adminlte')
@section('css')

@endsection


@section('header')

@endsection


@section('contenido')

    @if (session('yaInscrito'))
        <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('yaInscrito') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('mensaje'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('mensaje_error'))
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('mensaje_error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @foreach ($detalleCurso as $item)
                <table class=" table-sm table-responsive">
                    <tr>
                        <td>
                            <p><strong>ASIGNATURA: </strong> {{ $item->nombreMateria }}</p>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <p><strong>DOCENTE: </strong>{{ $item->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>LICENCIATURA: </strong> {{ $item->nombrePrograma }}</p>

                        </td>
                        <td>
                            <p><strong>MODALIDAD: </strong>{{ $item->nombreModalidad }}</p>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <p><strong>CUATRIMESTRE: </strong>{{ $item->numeroCuatrimestre }}</p>
                        </td>
                    </tr>

                </table>





            @endforeach
        </div>
    </div>
    @foreach ($curso as $curso)
        <div class="container">

            <form id="formulario" action="{{ route('enrolleToCourse', ['idCurso' => $curso->idCurso]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-5" style="display:block; margin:auto">
                        <h3>Alumnos no inscritos</h3>
                        <select multiple id="" size="20" style="width:350px" name="alumnos[]">
                            @if (count($alumnos) == 0)
                                <option value="1" class="text-center">No hay usuarios</option>
                            @else
                                @foreach ($alumnos as $alumno)
                                    <option value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }}
                                        {{ $alumno->apePaterno }} {{ $alumno->apeMaterno }}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="col-md-2" style="display: block; margin:auto">
                        <input name="add" class="btn btn-success" type="submit" value=">>">
                        <br><br>
                        <input name="del" type="submit" class="btn btn-success" value="<<">
                    </div>
                    <div class="col-md-5" style="display:block; margin:auto">
                        <h3>Alumnos inscritos</h3>
                        <select id="" multiple size="20" style="width:350px" name="delAlu[]">
                            @if (count($inscritos) == 0)
                                <option value="1" class="text-center">No se han inscrito usuarios</option>
                            @else
                                @foreach ($inscritos as $alumno)
                                    <option value="{{ $alumno->idUserCourse }}"> {{ $alumno->nombre }}
                                        {{ $alumno->apePaterno }} {{ $alumno->apeMaterno }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
            </form>

        </div>
    @endforeach
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
