@extends('layouts.adminlte')
@section('css')


@endsection
@section('header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-edit mr-3"></i>Editar datos</h1>
    <title>Editar</title>
@endsection

@section('contenido')
    @if (session('mensaje'))
        <div class="modal fade pt-5" id="myModal" style="opacity: 1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="text-center">
                                <br>
                                <i class="far fa-check-circle" style="font-size: 50px; color: green "></i>
                            </div>
                            <br>
                            {{ session('mensaje') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('mensajeError'))
        <div class="modal fade pt-5" id="myModal" style="opacity: 1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="text-center">
                                <br>
                                <i class="fas fa-exclamation-circle" style="font-size: 50px; color: red "></i>
                            </div>
                            <br>
                            {{ session('mensajeError') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('mensajeCorreo'))
        <div class="modal fade pt-5" id="myModal" style="opacity: 1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="text-center">
                                <br>
                                <i class="far fa-check-circle" style="font-size: 50px; color: green "></i>
                            </div>
                            <br>
                            {{ session('mensajeCorreo') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach ($students as $date)
        <nav class="nav nav-tabs justify-content-center grey" style="margin-top: -10px">
            <li class="nav-item">
                <a id="datos" href="{{ route('verPerfil', $date->idAlumno) }}" class="nav-link active bg-blue">Datos</a>
            </li>
            <li class="nav-item">
                <a style="color:black" href="{{ route('documentos', $date->idAlumno) }}"
                    class="nav-link">Documentos</a>
            </li>
            @can('Administrador')
                <li class="nav-item">
                    <a style="color:black; " href="{{ route('recepcionDocumentos', $date->idAlumno) }}" id="doc"
                        class="nav-link">Recepción Documentos</a>
                </li>
            @endcan
        </nav>
        <form class="text-center p-5" action="{{ route('actualizarInfo', $date->idAlumno) }}" method="post">
            @csrf
            @method('put')
            <h3>DATOS PERSONALES</h3>
            <div class="form-row">
                <!--Columna Datos de Alumnos-->
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <label>Nombre del alumno:</label><br>
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="md-form">
                        <input type="text" id="ap" class="form-control" name="apePaterno"
                            value="{{ $date->apePaterno }}">
                        <label for="">Apellido paterno</label>
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="md-form">
                        <input type="text" id="am" class="form-control" name="apeMaterno"
                            value="{{ $date->apeMaterno }}">
                        <label for="">Apellido materno</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="nomb" class="form-control" name="nombre" value="{{ $date->nombre }}">
                        <label for="">Nombre (s) </label>
                    </div>
                </div>
            </div>
            <!--Fin columna alumnos-->
            <br>
            <div class="form-row">
                <!--Columna edad-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="text" id="edad" class="form-control" name="edad"
                            onkeypress="return soloNumeros(event)" maxlength="2" value="{{ $date->edad }}">
                        <label for="">Edad</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="date" id="fecha" class="form-control" name="fecha" maxlength="10"
                            value="{{ $date->fechaNacimiento }}">
                        <label for="">Fecha</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="curp" class="form-control" name="curp" value="{{ $date->curp }}">
                        <label for="">CURP</label>
                    </div>
                </div>
            </div>
            <!--fin Columna edad-->
            <br>
            <div class="form-row">
                <!--Columna Domicilio-->
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <label>Domicilio particular:</label>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="md-form">
                        <input type="text" id="calle" class="form-control" name="calle" value="{{ $date->calle }}">
                        <label for="">Calle</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="text" id="number" class="form-control" name="numero"
                            value="{{ $date->numCalle }}">
                        <label for="">Número</label>
                    </div>
                </div>
            </div>
            <!---Fin columna domicilio-->
            <br>
            <div class="form-row">
                <!--Columna colonia-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="text" id="colonia" class="form-control" name="colonia"
                            value="{{ $date->colonia }}">
                        <label for="">Colonia</label>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" name="municipio">
                            <option value="{{ $date->idMunicipio }}" selected="true">{{ $date->nombreMunicipio }}
                            </option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->idMunicipio }}">{{ $municipio->nombreMunicipio }}
                                </option>
                            @endforeach
                        </select><label for="">Municipio</label>
                    </div>
                </div>
            </div>
            <!--Fin columna colonia-->
            <br>
            <div class="form-row">
                <!--Columna telefono-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="tel" id="telfij" class="form-control" name="telFijo"
                            onkeypress="return soloNumeros(event)" value="{{ $date->telFijo }}">
                        <label for="">Teléfono local</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">

                        <input type="tel" id="telcel" class="form-control" name="telCelular"
                            onkeypress="return soloNumeros(event)" value="{{ $date->telCelular }}">
                        <label for="telcel">Teléfono Celular</label>
                    </div>
                </div>
            </div>
            <!--Fin telefono-->
            <br>
            <div class="form-row">
                <!--Columna correo-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="sexo" class="form-control" name="sexo" value="{{ $date->sexo }}"
                            disabled>
                        <label for="">Sexo</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="email" id="email" class="form-control" name="correo"
                            value="{{ $date->correoAlumno }}">
                        <label for="">Correo electrónico</label>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="md-form">
                        @if ($date->correoInstitucional != null)
                            <input type="email" id="correoInstitucional" class="form-control"
                                value="{{ $date->correoInstitucional }}" disabled>
                            <input type="email" id="correoInstitucional" name="correoInstitucional" class="form-control"
                                value="{{ $date->correoInstitucional }}" hidden>
                        @else
                            <select name="correoInstitucional" id="" class="browser-default custom-select text-center">
                                <option value="0">Selecciona un correo institucional</option>
                                @foreach ($correoAlumnos as $item)
                                    <option value="{{ $item->id }}">{{ $item->email }}</option>
                                @endforeach

                            </select>
                        @endif

                        <label for="">Correo institucional</label>
                    </div>

                </div>
            </div>
            <!--Fin columna correo -->
            <br>
            <br>
            <h3>DATOS ESCOLARES</h3>
            <div class="form-row">
                <!--Columna dato escolar-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="esceg" class="form-control" name="escEgreso"
                            value="{{ $date->escEgreso }}">
                        <label for="">Escuela de egreso</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="generacion" class="form-control" name="generacion"
                            value="{{ $date->generacion }}">
                        <label for="">Generación</label>
                    </div>
                </div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="promEgreso" class="form-control" name="promEgreso"
                            value="{{ $date->promedioEgreso }}">
                        <label for="">Promedio de egreso</label>
                    </div>
                </div>

            </div>
            <!--Fin columna dato escolar-->
            <br>
            <h3>PROGRAMA DE BECAS</h3>

            <div class="form-row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <select class="browser-default custom-select text-center" name="tipoBeca" id="beca">
                        <option value="{{ $date->idTipoBeca }}">{{ $date->nombreTipoBeca }}</option>
                        @foreach ($type_beca as $tBeca)
                            <option style="text-align: center" value="{{ $tBeca->idTipoBeca }}">
                                {{ $tBeca->nombreTipoBeca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="prom">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" name="prom" id="prom">
                            <option value="{{ $date->idPromedio }}">{{ $date->promedio }}</option>
                            @foreach ($promedios as $promedio)
                                <option value="{{ $promedio->idPromedio }}">{{ $promedio->promedio }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="porc">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" name="porc" id="porc">
                            <option value="{{ $date->idPorcentaje }}">{{ $date->porcentaje }}</option>
                            @foreach ($porcentajes as $porcentaje)
                                <option value="{{ $porcentaje->idPorcentaje }}">{{ $porcentaje->porcentaje }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="conv">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" name="dependencia" required>
                            <option value="{{ $date->idDependencia }}">{{ $date->nombreDependencia }}</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->idDependencia }}">
                                    {{ $dependencia->nombreDependencia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="foraneo">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" id="municipio" name="municipio" disabled>
                            <option value="{{ $date->idMunicipio }}">{{ $date->nombreMunicipio }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="locali">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" class="form-control" id="locali" name="localidad" placeholder="Localidad"
                            value="{{ $date->localidad }}">
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

            <br>
            <div class="form-row" id="porc2">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" name="porc2" id="porc">
                            <option value="{{ $date->idPorcentaje }}">{{ $date->porcentaje }}</option>
                            @foreach ($porcentajes as $porcentaje)
                                <option value="{{ $porcentaje->idPorcentaje }}">{{ $porcentaje->porcentaje }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <h3>DATOS ACADÉMICOS</h3>
            <div class="form-row">
                <!--Columna academicos-->
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <label>Selecciona un periodo</label>
                        <select class="browser-default custom-select" name="perioInicio">
                            <option value="{{ $date->idPeriodo }}" disabled>{{ $date->nombrePeriodo }}
                                </option>
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->idPeriodo }}">{{ $periodo->nombrePeriodo }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <label>Selecciona una licenciatura</label>
                        <select class="browser-default custom-select" id="selector" name="programa">
                            <option value="{{ $date->idPrograma }}" disabled>{{ $date->nombrePrograma }}</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->idPrograma }}">{{ $programa->nombrePrograma }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--Fin columna academicos-->
            <br>
            <div class="form-row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <label>Selecciona una modalidad</label>
                        <select class="browser-default custom-select" name="modalidad">
                            <option value="{{ $date->idModalidad }}" disabled>{{ $date->nombreModalidad }}</option>
                            @foreach ($modalidades as $modalidad)
                                <option value="{{ $modalidad->idModalidad }}">{{ $modalidad->nombreModalidad }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--fin-->
            <br>
            <h3>DATOS DEL PADRE O TUTOR</h3>
            <div class="form-row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="nombtutor" class="form-control" name="nombtutor"
                            value="{{ $date->nombreTutor }}">
                        <label>Nombre</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="parentesco" class="form-control" name="parentesco"
                            value="{{ $date->parentescoTutor }}">
                        <label>Parentesco</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="directutor" class="form-control" name="directutor"
                            value="{{ $date->domicilioTutor }}">
                        <label>Dirección</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="tel" id="teltutor" class="form-control" name="teltutor"
                            onkeypress="return soloNumeros(event)" value="{{ $date->telTutor }}">
                        <label>Teléfono</label>
                    </div>
                </div>
            </div>
            <br>
            @can('Administrador')
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        @if ($date->cartaCompromiso != null)
                            <input type="checkbox" class="custom-control-input" checked="checked" disabled>
                            <input type="checkbox" value="Pendiente" checked="checked" name="check" hidden>
                        @else
                            <input type="checkbox" class="custom-control-input" id="check" value="Pendiente" name="check">
                        @endif

                        <label class="custom-control-label" for="check">Habilitar carta compromiso</label><br>
                    </div>
                </div>
            @endcan
            <br>
            <div class="col-md-12">

                @can('Administrador')
                    <button class="btn btn-success btn-sm" type="submit">Actualizar</button>
                @endcan
            </div>
        </form>
    @endforeach

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src={{ asset('js/programaBecas.js') }}></script>

    <script type="text/javascript">
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#myModal").modal();
        });
    </script>


@endsection





@endsection
