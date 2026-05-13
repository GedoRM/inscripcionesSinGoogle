@extends('layouts.adminlte')

@section('css')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@endsection

@section('header')
    <h1 class="m-0 text-dark"><i class="fas fa-file-alt mr-3"></i>Mis documentos</h1>
    <style>
        #msj-doc {
            background-color: rgba(255, 0, 0, 0.5);
            color: white;
            font-weight: 500;
            padding: 10px;
            margin-top:25px;
            margin-bottom:25px;
        }

    </style>
@endsection

@section('contenido')
    @if (session('sinSeleccionar'))
        <div class="modal pt-5" id="myModal" style="top:20%" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="text-center">
                                <br>
                                <i class="fas fa-exclamation-triangle" style="font-size: 50px; color: red "></i>
                            </div>
                            <br>
                            {{ session('sinSeleccionar') }}
                            <div class="text-center mt-2">
                                <button type="button" class="btn btn-success btn-sm" id="close"
                                    data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('correcto'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('correcto') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @foreach ($student as $date)
        <nav class="nav nav-tabs justify-content-center grey" style="margin-top: -10px">
            <li class="nav-item">
                <a style="color:black" id="datos" href="{{ route('miPerfil', Crypt::encrypt($date->id)) }}"
                    class="nav-link">Datos</a>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link active bg-blue">Documentos</a>
            </li>
        </nav>
        <div id="msj-doc">
            <p>Carga tus archivos, nombrándolos con la siguiente nomenclatura:
                <strong>ADM_IM_XXYZ_[Nombredeldocumento]</strong>.
                Sustituye las XX <strong>por las dos primeras letras de tu primer nombre</strong>, la Y por la inicial
                de tu apellido paterno y la Z <strong>por la inicial de tu apellido materno</strong>.
            </p>
            <p>Al final sustituye la palabra dentro de los corchetes por el nombre del documento que estas subiendo.</p>
        </div>
        <form action="{{ route('uploadDocuments', Crypt::encrypt($date->id)) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table p-5">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">
                                    <label>
                                        <p>Nombre del documento</p>
                                    </label>
                                </th>
                                <th scope="col">
                                    <label>
                                        <p>Documento</p>
                                    </label>
                                </th>
                                <th scope="col">
                                    <label>
                                        <p>Descargar</p>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="acta_nacimiento">
                                        <p>Acta de nacimiento</p>
                                    </label>
                                </td>

                                @if ($date->actaNacimiento != null)
                                    <td>
                                        <input type="file" disabled id="actaNacimiento">

                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->actaNacimiento, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->actaNacimiento }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="actaNacimiento" id="actaNacimiento">

                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="const_estudio">
                                        <p>Constancia de estudios o Certificado de bachillerato</p>
                                    </label>

                                </td>

                                @if ($date->constanciaEstudios != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->constanciaEstudios, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->constanciaEstudios }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="constanciaEstudios" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="curp">
                                        <p>CURP</p>
                                    </label>
                                </td>

                                @if ($date->curp != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->docCurp, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->docCurp }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="curp" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="ine">
                                        <p>INE o credencial escolar</p>
                                    </label>
                                </td>

                                @if ($date->ine != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->ine, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->ine }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="ine" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="ine_tutor">
                                        <p>INE del tutor</p>
                                    </label>
                                </td>
                                @if ($date->ineTutor != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->ineTutor, 'id' => Crypt::encrypt($date->idAlumno)])}}">
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="ineTutor" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="comp_domicilio">
                                        <p>Comprobante de domicilio</p>
                                    </label>
                                </td>

                                @if ($date->comprobanteDomicilio != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->comprobanteDomicilio, 'id' => Crypt::encrypt($date->idAlumno)])}}">
                                            {{ $date->comprobanteDomicilio }}
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="comprobanteDomicilio" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="foto">
                                        <p>Foto</p>
                                    </label>
                                </td>
                                @if ($date->foto != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->foto, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->foto }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="foto" id="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td>
                                    <label for="pago">
                                        <p>Comprobante de pago</p>
                                    </label>
                                </td>

                                @if ($date->comprobantePago != null)
                                    <td>
                                        <input type="file" disabled id="">
                                    </td>
                                    <td>
                                        <a href="{{route('descargarDocumento', ['documento' => $date->comprobantePago, 'id' => Crypt::encrypt($date->idAlumno)])}}"> {{ $date->comprobantePago }}</a>
                                    </td>
                                @else
                                    <td>
                                        <input type="file" name="comprobantePago" id="" value="">
                                    </td>
                                    <td>
                                        <label for="">Ningún archivo cargado</label>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>

            </div>
            <div class="col-md-12 ">
                <input class="m-auto d-block btn btn-primary" type="submit" value="Subir documento">
            </div>
        </form>
    @endforeach
@endsection

@section('js')

@endsection
