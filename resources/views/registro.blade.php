<!DOCTYPE html>
<html lang="esp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.css" rel="stylesheet" />

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <title></title>

</head>

<body class="contenedor">
    <h2 class="text-center">SOLICITUD DE INSCRIPCIÓN</h2>
    <br>
    <div class="container">
        @if (session('mensaje'))
            <div class="modal fade pt-5" style="display:block" id="myModal" style="top:20%" tabindex="-1" role="dialog">
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
                                <div class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" id="close"
                                        data-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <form class="text-center" method="post" action="{{ route('newStudent') }}">
            @csrf
            <h3>DATOS PERSONALES</h3>
            <div class="form-row">
                <!--Columna Datos de Alumnos-->
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <label>Nombre del alumno:</label><br>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="md-form">
                        <input type="text" id="ap" class="form-control" name="apepat" required>
                        <label for="ap">Apellido paterno</label>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="md-form">
                        <input type="text" id="am" class="form-control" name="apemat" required>
                        <label for="am">Apellido materno</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="nomb" class="form-control" name="nombre" required>
                        <label for="nomb">Nombre(s)</label>
                    </div>
                </div>
            </div>
            <!--Fin columna alumnos-->
            <div class="form-row">
                <!--Columna Domicilio-->
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <label>Domicilio particular:</label>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="md-form">
                        <input type="text" id="calle" class="form-control" name="calle" required>
                        <label for="calle">Calle</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="text" id="number" class="form-control" name="numero" required>
                        <label for="number">Número</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12"></div>
                <div class="col-md-7 col-12">
                    <div class="md-form">
                        <input type="text" id="colonia" class="form-control" name="colonia" required>
                        <label for="col">Colonia</label>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" id="municipio" name="municipio" required>
                            <option value="0" disabled>Selecciona un municipio</option>
                            @foreach ($municipio as $municipio)
                                <option value="{{ $municipio->idMunicipio }}">{{ $municipio->nombreMunicipio }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="tel" id="telfij" class="form-control" name="telfijo"
                            onkeypress="return soloNumeros(event)">
                        <label for="telfij">Teléfono fijo</label>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="tel" id="telcel" class="form-control" name="telcelular"
                            onkeypress="return soloNumeros(event)" required>
                        <label for="telcel">Teléfono celular</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="text" id="edad" class="form-control" name="edad"
                            onkeypress="return soloNumeros(event)" maxlength="2" required>
                        <label for="edad">Edad</label>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="md-form">
                        <input type="date" id="fecha" class="form-control" name="fecha" maxlength="10" required>
                        <label for="edad">Fecha de nacimiento</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="curp" class="form-control" name="curp" required>
                        <label for="curp">CURP</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-1 col-6">
                    <div class="md-form">
                        <label>Sexo:</label>
                    </div>
                </div>
                <div class="col-md-1 col-3">
                    <div class="md-form custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="checkM" value="masculino" name="sexo"
                            required>
                        <label class="custom-control-label" for="checkM">M</label>
                    </div>
                </div>
                <div class="col-md-1 col-3">
                    <div class="md-form custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="checkF" value="femenino" name="sexo"
                            required>
                        <label class="custom-control-label" for="checkF">F</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="email" id="email" class="form-control" name="correo" required>
                        <label for="email">Correo electrónico</label>
                    </div>
                </div>
            </div>
            <!--Fin datos alumnos -->
            <br>
            <h3>DATOS ESCOLARES:</h3>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="text" id="esceg" class="form-control" name="esceg" required>
                        <label for="esceg">Escuela de egreso</label>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="text" id="generacion" class="form-control" name="generacion" required>
                        <label for="generacion">Generación</label>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <input type="text" id="promedio" class="form-control" name="promedio" required>
                        <label for="promedio">Promedio</label>
                    </div>
                </div>
            </div>
            <br>
            <h3>DATOS ACADÉMICOS</h3>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" id="periodo" name="periodo" required>
                            <option value="0" disabled>Selecciona un periodo</option>
                            @foreach ($periodo as $periodo) 
                                <option value="{{ $periodo->idPeriodo }}">
                                {{ $periodo->nombrePeriodo }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" id="programa" name="programa" required>
                            <option value="0" disabled>Selecciona un programa educativo</option>
                            @foreach ($programa as $programa)
                                <option value={{ $programa->idPrograma }}>{{ $programa->nombrePrograma }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-5 col-12">
                    <div class="md-form">
                        <select class="browser-default custom-select" id="modalidad" name="modalidad" required>
                            <option value="0" disabled>Selecciona una modalidad</option>
                            @foreach ($modalidad as $modalidad)
                                <option value={{ $modalidad->idModalidad }}>{{ $modalidad->nombreModalidad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <h3>DATOS DEL PADRE O TUTOR</h3>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-6">
                    <div class="md-form">
                        <input type="text" id="nombtutor" class="form-control" name="nombtutor" required>
                        <label for="nombtutor">Nombre</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="text" id="parentesco" class="form-control" name="parentesco" required>
                        <label for="parentesco">Parentesco</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 col-12">
                </div>
                <div class="col-md-6 col-12">
                    <div class="md-form">
                        <input type="text" id="directutor" class="form-control" name="directutor" required>
                        <label for="directutor">Domicilio</label>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="md-form">
                        <input type="tel" id="teltutor" class="form-control" name="teltutor"
                            onkeypress="return soloNumeros(event)" required>
                        <label for="teltutor">Teléfono</label>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    </div>
    <br>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>

    <script>
    $("#close").click(function(){
    $("#myModal").modal("hide");
    });
    </script>

    <script type="text/javascript">
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
    </script>

    <script>
        $(document).ready(function() {
            document.getElementById("programa").value = 0;
            document.getElementById("modalidad").value = 0;
            document.getElementById("periodo").value = 0;
            document.getElementById("municipio").value = 0;
        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.cerrar', function() {
                $('#mensaje').hide();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $("#mensaje").fadeOut(1500);
            }, 1500);

        });
    </script>

    <script>
        $(document).ready(Principal);

        function Principal() {
            var flag1 = true;
            $(document).on('keyup', '[id=fecha]', function(e) {
                if ($(this).val().length == 2 && flag1) {
                    $(this).val($(this).val() + ":");
                    flag1 = false;
                }

            });
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#myModal").modal();
        });
    </script>
</body>

</html>
