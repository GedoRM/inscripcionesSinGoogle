@foreach ($clausulas as $data)

    <div id="modalTyC" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false"
        style="opacity: 1">
        <div class="modal-dialog-scrollable modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="w-100 text-center"><strong>Términos y Condiciones</strong></h5>
                </div>
                <div class="modal-body" id="modal">
                    <h5 class="text-center">
                        <strong>DISPOSICIONES GENERALES DEL INSTITUTO TECNOLÓGICO DE ESPECIALIZACIÓN CORPORATIVA,
                            JURÍDICA Y FISCAL A.C</strong>
                    </h5>
                    <br>
                    <div style="text-align: justify;" id="total">
                        <p style="text-align: justify;" id="fecha_completa">
                            Instituto Tecnológico de Especialización Corporativa, Jurídica y Fiscal,
                            A.C. y el (la) alumno(a) acuerdan las siguientes disposiciones generales que
                            regularán los servicios educativos que el Instituto prestará al alumno:
                        </p>
                        <p>
                            - Todo alumno que se inscriba en el nivel licenciatura
                            deberá presentar su hoja de inscripción y documentación en el área de coordinación académica
                            para su alta en el sistema.
                        </p>
                        <p>
                            - Se considera como inscrito a un alumno en el momento que haya cubierto el pago total de su
                            inscripción.
                        </p>
                        <p>
                            - Todo pago que se efectúa en caja, presupone para el Instituto una serie de trámites
                            internos,
                            esto implica que el alumno que cubra cuotas por cualquier concepto y desee darse de baja
                            estará sujeto a las siguientes condiciones:
                        </p>
                        <p>
                            a) Los alumnos que hayan realizado el pago total o parcial de la inscripción y cancelen su
                            ingreso a la universidad,
                            no se les reembolsará monto alguno de lo pagado.<br>
                            b) Los pagos por concepto de reinscripción no serán devueltos aun cuando el alumno cancele
                            su reingreso al Instituto.<br>
                            c) Los alumnos que acumulen tres colegiaturas vencidas, automáticamente y de acuerdo con los
                            lineamientos de cobranza
                            causarán baja temporal y sólo podrán reinscribirse a partir del próximo ciclo cuatrimestral
                            siempre y cuando hayan
                            liquidado su adeudo. Cuando el alumno deje de asistir a clases sin previo aviso, deberá
                            solicitar al área de
                            control escolar el registro de la baja y deberá cubrir las colegiaturas correspondientes (si
                            las tuviere) de acuerdo
                            con la fecha de aplicación.<br>
                            d) Los alumnos que cubran el pago del cuatrimestre por adelantado y se den de baja por
                            cualquier motivo antes de finalizar
                            el curso o durante el mismo y soliciten la devolución de su pago, aplicará lo siguiente:<br>
                        <ul>
                            <li>
                                La inscripción o reinscripción no estará sujeta a devolución.
                            </li>
                            <li>
                                Podrá devolverse el monto de colegiaturas no cursadas al momento de la baja.
                            </li>
                        </ul>
                        <p>
                            e) Cualquier baja deberá solicitarse mediante el formato oficial de
                            baja y concluir el proceso para que no se acumulen adeudos por otros conceptos.
                            Es responsabilidad del alumno realizar el trámite y liquidar los adeudos vencidos al
                            Instituto.
                            De igual forma acudir al área de coordinación académica cuando no se tengan pendientes
                            administrativos para notificar
                            y solicitar la devolución de los documentos en resguardo, en un máximo de 5 días hábiles. En
                            caso de requerir el
                            certificado parcial el plazo de entrega de documentación será mayor.<br>
                        </p>
                        <p>
                            - En términos del artículo 2856 y demás aplicables del Código Civil, el alumno manifiesta su
                            voluntad en dejar en prenda
                            los documentos que le haya proporcionado al Instituto y aquellos que se hayan generado con
                            motivo de los estudios realizados,
                            hasta en tanto realice el pago de cualquier adeudo que derive de inscripción, colegiatura o
                            cualquiera de los servicios que
                            haya recibido del Instituto.<br>
                        </p>
                        <p>
                            - Alumnos que tengan adeudos de ciclos anteriores al inicio de un nuevo ciclo, no se podrán
                            inscribir hasta cubrir los adeudos
                            vencidos.<br>
                        </p>
                        <p>
                            - Los pagos de colegiatura son del 01 al 10 de cada mes, posterior a este plazo se aplicará
                            un recargo del 10%.
                            En caso que el día de pago coincida en domingo o día festivo, podrá efectuarse al siguiente
                            día hábil.
                            Es importante considerar que aquellos pagos que se realicen con cheque, deberán hacerse tres
                            días hábiles antes de
                            la fecha límite de pago para que se consideren como pagos realizados en tiempo.<br>
                        </p>
                        <p>
                            - Para tener derecho a presentar exámenes parciales y finales el alumno no deberá presentar
                            colegiaturas vencidas en su estado de cuenta.<br>
                        </p>
                        <p>
                            - Se da por enterado que se realiza un pago de reinscripción por cada periodo cuatrimestral
                            y cuatro pagos de colegiatura mensual,
                            los cuales constituyen el costo real. Sin embargo, el Instituto otorga un descuento
                            adicional y/o beca cuando aplique, mismos
                            que será vigente hasta la publicación de una actualización de cuotas registradas ante la
                            autoridad competente.<br>
                        </p>
                        <p>
                            - Para el otorgamiento y/o renovación de beca el alumno deberá estar inscrito a algún
                            programa académico, presentar la
                            solicitud correspondiente en los términos y plazos establecidos anexando la documentación
                            comprobatoria, haber obtenido el
                            promedio general de 8.5 en el periodo inmediato anterior y no haber reprobado ninguna
                            materia.<br>
                        </p>
                        <p>
                            - El alumno se obliga a conocer y cumplir todas las disposiciones establecidas en el
                            Reglamento General del
                            Instituto Tecnológico de Especialización Corporativa, Jurídica y Fiscal, A.C. y demás
                            disposiciones aplicables del
                            Reglamento de la Escuela correspondiente y, en general, toda aquella normativa que sea
                            emitida por el Instituto.<br>
                        </p>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center w-100">
                        <form action="{{ route('updateTyC', $data->idAlumno) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check" disabled="true"
                                    value="Aceptado" name="tyc" onchange="chkTyC(this)" required>
                                <label class="custom-control-label" for="check">HE LEÍDO Y ACEPTO LOS TÉRMINOS Y
                                    CONDICIONES</label><br>
                                <input type="submit" class="btn btn-success" id="aceptar" name="Ido" disabled
                                    value="Terminar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalCartaCompromiso" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false"
        style="opacity:1">
        <div class="modal-dialog-scrollable modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="w-100 text-center"><strong>Carta Compromiso</strong></h5>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">
                        <strong>DISPOSICIONES GENERALES DEL INSTITUTO TECNOLÓGICO DE ESPECIALIZACIÓN CORPORATIVA,
                            JURÍDICA Y FISCAL A.C</strong>
                    </h5>
                    <br>
                    <div style="text-align: justify;">
                        <p style="text-align: right;" id="fecha_completa">

                        </p><br>
                        <p>
                            <strong>C.P. MADAI DE LOS ÁNGELES CAMPOS NARVAEZ</strong><br> DIRECTORA DE ITEC MAGISTRATUS
                            PRESENTE
                        </p>
                        <br>
                        <p>
                            Por este conducto, el (la) que suscribe
                            <strong>{{ $nombreC = $data->nombre . ' ' . $data->apePaterno . ' ' . $data->apeMaterno }}
                            </strong>
                            inscrito(a) a la licenciatura en <strong>{{ $data->nombrePrograma }}</strong>
                            para el periodo escolar <strong>{{ $data->nombrePeriodo }}</strong>
                            manifiesto bajo protesta de decir verdad que me comprometo a entregar el certificado de
                            bachillerato original debidamente legalizado (si fuese el caso) en un plazo no mayor a
                            cuatro meses contados
                            a partir del inicio del referido periodo escolar.
                        </p>
                        <p>
                            De no entregar el documento en el plazo previsto en el párrafo anterior se entenderá que no
                            cuento con los estudios correspondientes al nivel educativo anterior al que esté cursando,
                            por lo que seré suspendido de manera inmediata.
                        </p>
                        <p>
                            Así mismo en caso de que mi fecha de conclusión de los estudios de bachillerato resultara
                            con invasión de ciclo se me dará de baja definitiva del sistema sin responsabilidad para la
                            institución y en el entendido que ningún pago
                            por concepto de inscripción me será devuelto, ya que fue tomado en cuenta para la
                            integración de grupos, contratación de personal y demás conceptos.
                        </p>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center w-100">
                        <form action="{{ route('updatecCompromiso', $data->idAlumno) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check_carta" value="Aceptado"
                                    name="cartaCompromiso" onchange="comprobar(this)">
                                <label class="custom-control-label" for="check_carta">HE LEÍDO Y ACEPTO</label><br>
                                <input type="submit" class="btn btn-success" id="aceptado" value="Terminar" disabled>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    <style>
        #text-card {
            color: white;
        }

    </style>
@endsection
@section('header')
    <h2>Bienvenido</h2>
@endsection
<div class="row">
    <div class="col-12 col-md-4">
        <a href="{{ route('miPerfil', Crypt::encrypt(Auth::user()->id)) }}">
            <div class="card" style="background-color: rgba(0,142,210,0.5); ">
                <div class="card-body">
                    <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                        Mi perfil
                    </p>
                    <br>
                    <p id="text-card" class="text-right" style="font-size:30px"><i class="fas fa-address-card"></i>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('avanceReticular', Crypt::encrypt(Auth::user()->id)) }}">
            <div class="card" style="background-color: rgba(12, 201, 5, 0.5); ">
                <div class="card-body">
                    <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                        Avance reticular
                    </p>
                    <br>
                    <p id="text-card" class="text-right" style="font-size:30px">
                        <i class="fas fa-list-alt"></i>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('calificacionesParciales', Crypt::encrypt(Auth::user()->id)) }}">
            <div class="card" style="background-color: rgba(255, 0, 50, 0.5); ">
                <div class="card-body">
                    <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">

                        Calificaciones parciales
                    </p>
                    <br>
                    <p id="text-card" class="text-right" style="font-size:30px">
                        <i class="fas fa-clipboard-list"></i>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('buscarBoleta', Crypt::encrypt(Auth::user()->id)) }}">
            <div class="card" style="background-color: rgba(210, 119, 0, 0.5); ">
                <div class="card-body">
                    <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                        Boleta de calificaciones
                    </p>
                    <br>
                    <p id="text-card" class="text-right" style="font-size:30px">
                        <i class="fas fa-list-alt"></i>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('historialPago', Crypt::encrypt(Auth::user()->id)) }}">
            <div class="card" style="background-color: rgba(151, 0, 210, 0.5); ">
                <div class="card-body">
                    <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                        Historial de pagos
                    </p>
                    <br>
                    <p id="text-card" class="text-right" style="font-size:30px">
                        <i class="fas fa-money-bill-alt"></i>
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @if ($data->termyCond == null)
        <script type='text/javascript'>
            $(function() {
                $('#modalTyC').modal("show");
            });
        </script>
    @else
        <script type='text/javascript'>
            $(function() {
                $('#modalTyC').modal("hide");
            });
        </script>
    @endif

    @if ($data->cartaCompromiso == 'Pendiente')
        <script type='text/javascript'>
            $(function() {
                $('#modalCartaCompromiso').modal("show");
            });
        </script>
    @else
        <script type='text/javascript'>
            $(function() {
                $('#modalCartaCompromiso').modal("hide");
            });
        </script>
    @endif

    <script>
        function comprobar(obj) {
            if (obj.checked) {
                document.getElementById('aceptado').disabled = false;
            } else {
                document.getElementById('aceptado').disabled = true;
            }
        }
    </script>

    <script>
        function chkTyC(obj) {
            if (obj.checked) {
                document.getElementById('aceptar').disabled = false;
            } else {
                document.getElementById('aceptar').disabled = true;
            }
        }
    </script>


    <script>
        var boton = document.getElementById('aceptar');
        var check = document.getElementById('check');
        $('#modal').scroll(function() {
            alturaScrolleada = $(this).scrollTop();
            alturaTotal = $('#total').height();
            alturaVista = $(this).height();
            suma = alturaVista + alturaScrolleada;
            /*console.log("Altura total de la pagina:"+alturaTotal);
            console.log("Total de lo que falta:"+alturaVista);
            console.log("Total de altura scrolleada:"+alturaScrolleada);
            console.log(suma);
            */
            if ((alturaVista + alturaScrolleada) >= alturaTotal) {

                check.disabled = false;
            } else {
                boton.disabled = true;
                check.disabled = true;
            }
        });
    </script>

    <script>
        var fecha = new Date();
        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
            "Octubre", "Noviembre", "Diciembre");
        var dia = fecha.getDate();
        var mes = meses[fecha.getMonth()];
        var ano = fecha.getFullYear();
        var fecha_completa = "San Francisco de Campeche, Camp., a <strong>" + dia + "</strong> de <strong>" + mes +
            "</strong> del <strong>" + ano + "</strong>";
        var objetivo = document.getElementById('fecha_completa');
        objetivo.innerHTML = fecha_completa;
    </script>
@endsection
