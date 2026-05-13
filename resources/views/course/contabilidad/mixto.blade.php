@extends('layouts.adminlte')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection
@section('header')
    <h1 class="m-0 text-dark"><i class="far fa-list-alt mr-3"></i>Lista de cursos</h1>
@endsection

@section('contenido')
    @if (session('existeCurso'))
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('existeCurso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif
    @if (session('cursoElminado'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('cursoEliminado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif
    @if (session('cursoAñadido'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('cursoAñadido') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif
    
    <div class="row">
        <div class="col-md-2">
            <button class="btn btn-success btn-sm" data-target="#modalNewCourse" id="new" data-toggle="modal">
                <i class="fas fa-plus mr-3"></i>Añadir nuevo curso
            </button>
        </div>
        <div class="col-md-2">

            <div class="custom-control custom-checkbox">
                <form id="check">
                    @csrf
                    @if ($valor == '1')
                        <input type="checkbox" checked value="" class="custom-control-input" name="habilitar"
                            id="habilitar">
                        <label class="custom-control-label" for="habilitar">Deshabilitar para calificar</label>
                    @else
                        <input type="checkbox" value="1" class="custom-control-input" name="habilitar" id="habilitar">
                        <label class="custom-control-label" for="habilitar">Habilitar para calificar</label>
                    @endif
                </form>
                <!-- <form id="evDocente">
                            @csrf
                            
                                <input type="checkbox" value="1" class="custom-control-input" name="habilitarEvDocente" id="habilitarEvDocente">
                                <label class="custom-control-label" for="habilitarEvDocente">Habilitar Evaluación Docente</label>
                        
                        </form>-->
            </div>
        </div>
    </div>
    <br><br>
    <table id="wScroll" class="display table nowrap table-bordered" style="width: 100%">
        <thead class="text-center">
            <tr>
                <th>id</th>
                <th>NOMBRE DEL GRUPO</th>
                <th>NOMBRE DE LA MATERIA</th>
                <th>NOMBRE DEL PROFESOR</th>
                <th>CUATRIMESTRE</th>
                <th>STATUS</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->idCurso }}</td>
                    <td class="text-center">
                        <a href="{{ route('enrollStudents', $dato->idCurso) }}">
                            {{ $dato->nombreGrupo }}
                        </a>
                    </td>
                    <td>{{ $dato->nombreMateria }}</td>
                    <td class="text-center">{{ $dato->name }}</td>

                    <td class="text-center">{{ $dato->numeroCuatrimestre }}</td>
                    <td class="text-center">{{ $dato->status }}</td>
                    <td>
                        <div class="row">
                            <a href="#">
                                <button class="btn btn-success btn-sm" title="Editar"><i
                                        class="fas fa-pen"></i></button>
                            </a>
                            <a href="{{ route('enrollStudents', $dato->idCurso) }}">
                                <button class="btn btn-primary btn-sm" title="Alumnos"><i
                                        class="fas fa-users"></i></button>
                            </a>
                            <form action="{{ route('eliminarCurso', $dato->idCurso) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Eliminar"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!--</div>-->
    <div class="modal" id="modalNewCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="firstForm" action="{{ route('addCourse') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Añadir nuevo curso</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">

                        <div class="md-form mb-4">
                            <label for="">Nombre del grupo</label><br>
                            <input type="text" class="form-control validate" name="nombreGrupo">
                        </div>

                        <div class="md-form mb-5">
                            <form>
                                <label>Nombre de la materia</label>
                                <select name="materia" class="browser-default custom-select" id="selecMateria"
                                    onchange="cambiar(), boton()">
                                    <option value="0" selected>Seleciona una materia</option>
                                    @foreach ($materia as $item)
                                        <option value="{{ $item->idMateria }}">{{ $item->nombreMateria }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div id="recarga2" class="md-form mb-5">
                        </div>
                        <div class="md-form mb-5">
                            <label>Nombre del docente</label>
                            <select name="docente" id="selectDocente" class="browser-default custom-select" disabled>
                                <option value="0" selected> Selecciona un docente</option>
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->user_id }}">{{ $docente->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <label for="">Fecha de inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" required>
                            </div>
                            <div class="col-md-6 mb-5">
                                <label for="">Fecha de fin</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" min="{{ $fecha = date('Y-m-d') }}"
                                    required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" value="Registrar" id="registrar" class="btn btn-success btn-sm" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset('js/dataTable.js') }}></script>
    <script>
        function cambiar() {
            $.ajax({
                method: 'POST',
                url: "{{ route('detailMaterie') }}",
                data: $("#firstForm").serialize(),
                beforeSend: function(objeto) {},
                success: function(data) {
                    $("#recarga2").html(data);
                }
            });
        }

        function boton() {
            var select = document.getElementById('selecMateria').value;
            var boton = document.getElementById('registrar');
            var docente = document.getElementById('selectDocente');
            var fecha_inicio = document.getElementById('fecha_inicio');
            var fecha_fin = document.getElementById('fecha_fin');

            if (select != 0) {
                boton.disabled = false;
                docente.disabled = false;
                fecha_inicio.disabled = false
                fecha_fin.disabled = false;

            } else {
                boton.disabled = true;
                docente.disabled = true;
                fecha_inicio.disabled = true;
                fecha_fin.disabled = true;
            }
        }
    </script> 
    <script>
        $(document).ready(function() {
            $("#habilitar").on('change', function() {

                $.ajax({
                    type: "POST",
                    url: "{{ route('permisoCalificar') }}",
                    data: $("#check").serialize(),
                    success: function(res) {
                        location.reload();
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#evDocente").on('change', function() {

                $.ajax({
                    type: "POST",
                    url: "{{ route('habilitarEvDocente') }}",
                    data: $("#check").serialize(),
                    success: function(res) {
                        location.reload();
                    }
                })
            })
        })
    </script>
@endsection
