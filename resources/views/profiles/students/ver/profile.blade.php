@extends('layouts.adminlte')
@section('css')

@endsection
@section('header')
    <h1 class="m-0 text-dark"><i class="fas fa-user mr-3"></i>Mi perfil</h1>
    <title>Mi perfil</title>
@endsection

@section('contenido')

    @foreach ($users as $date)
        <nav class="nav nav-tabs justify-content-center grey" style="margin-top: -10px">
            <li class="nav-item">
                <a id="datos" href="#" class="nav-link active bg-blue">Datos</a>
            </li>
            <li class="nav-item">
                <a style="color:black" href="{{ route('viewDocuments', Crypt::encrypt($date->id)) }}" class="nav-link">Documentos</a>
            </li>
        </nav>
        <div class="text-center p-5">

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
                        <input type="text" id="ap" class="form-control" name="apePaterno" value="{{ $date->apePaterno }}"
                            disabled>
                        <label for="">Apellido paterno</label>
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="md-form">
                        <input type="text" id="am" class="form-control" name="apeMaterno" value="{{ $date->apeMaterno }}"
                            disabled>
                        <label for="">Apellido materno</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="nomb" class="form-control" name="nombre" value="{{ $date->nombre }}"
                            disabled>
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
                        <input disabled type="text" id="edad" class="form-control" name="edad"
                            onkeypress="return soloNumeros(event)" maxlength="2" value="{{ $date->edad }}">
                        <label for="">Edad</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input disabled type="date" id="fecha" class="form-control" name="fecha" maxlength="10"
                            value="{{ $date->fechaNacimiento }}">
                        <label for="">Fecha</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input disabled type="text" id="curp" class="form-control" name="curp" value="{{ $date->curp }}">
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
                        <input disabled type="text" id="calle" class="form-control" name="calle"
                            value="{{ $date->calle }}">
                        <label for="">Calle</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input disabled type="text" id="number" class="form-control" name="numero"
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
                        <input disabled type="text" id="colonia" class="form-control" name="colonia"
                            value="{{ $date->colonia }}">
                        <label for="">Colonia</label>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" name="municipio" disabled>
                            <option value="{{ $date->idMunicipio }}" selected="true">{{ $date->nombreMunicipio }}</option>
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
                        <input disabled type="tel" id="telfij" class="form-control" name="telFijo"
                            onkeypress="return soloNumeros(event)" value="{{ $date->telFijo }}">
                        <label for="">Teléfono local</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">

                        <input disabled type="tel" id="telcel" class="form-control" name="telCelular"
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
                        <input disabled type="text" id="sexo" class="form-control" name="sexo" value="{{ $date->sexo }}"
                            disabled>
                        <label for="">Sexo</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input disabled type="email" id="email" class="form-control" name="correo"
                            value="{{ $date->correoAlumno }}">
                        <label for="">Correo electrónico</label>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="md-form">

                        <input disabled type="email" id="correoInstitucional" class="form-control"
                            value="{{ $date->correoInstitucional }}" disabled>
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
                        <input disabled type="text" id="esceg" class="form-control" name="escEgreso"
                            value="{{ $date->escEgreso }}">
                        <label for="">Escuela de egreso</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input disabled type="text" id="generacion" class="form-control" name="generacion"
                            value="{{ $date->generacion }}">
                        <label for="">Generación</label>
                    </div>
                </div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-2 col-12"></div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input disabled type="text" id="promEgreso" class="form-control" name="promEgreso"
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
                    <select class="browser-default custom-select text-center" name="tipoBeca" id="beca" disabled>
                        <option value="{{ $date->idTipoBeca }}">{{ $date->nombreTipoBeca }}</option>
                    </select>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="form-row" id="prom">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="md-form">
                        <select class="browser-default custom-select text-center" name="prom" id="prom" disabled>
                            <option value="{{ $date->idPromedio }}">{{ $date->promedio }}</option>
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
                        <select class="browser-default custom-select text-center" name="porc" id="porc" disabled>
                            <option value="{{ $date->idPorcentaje }}">{{ $date->porcentaje }}</option>
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
                        <select class="browser-default custom-select text-center" name="dependencia" disabled>
                            <option value="{{ $date->idDependencia }}">{{ $date->nombreDependencia }}</option>
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
                        <input disabled type="text" class="form-control" id="locali" name="localidad"
                            placeholder="Localidad" value="{{ $date->localidad }}">
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
                        <select class="browser-default custom-select" name="perioInicio" disabled>
                            <option value="{{ $date->idPeriodo }}">{{ $date->nombrePeriodo }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <label>Selecciona una licenciatura</label>
                        <select class="browser-default custom-select" id="selector" name="programa" disabled>
                            <option value="{{ $date->idPrograma }}">{{ $date->nombrePrograma }}</option>
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
                        <select class="browser-default custom-select" name="modalidad" disabled>
                            <option value="{{ $date->idModalidad }}">{{ $date->nombreModalidad }}</option>
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
                            value="{{ $date->nombreTutor }}" disabled>
                        <label>Nombre</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="parentesco" class="form-control" name="parentesco"
                            value="{{ $date->parentescoTutor }}" disabled>
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
                            value="{{ $date->domicilioTutor }}" disabled>
                        <label>Dirección</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input disabled type="tel" id="teltutor" class="form-control" name="teltutor"
                            onkeypress="return soloNumeros(event)" value="{{ $date->telTutor }}">
                        <label>Teléfono</label>
                    </div>
                </div>
            </div>
            <br>
        </div>
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
