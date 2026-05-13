@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
    <h3><i class="fas fa-file-signature mr-3"></i>Acta de curso</h3>

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
        <div class="col-md-12">
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-8">
            <table class="table text-center table-striped">
                <thead>
                    <th id="head">Nombre</th>
                    <th id="head">Status</th>
                    <th id="head">Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Primer parcial</td>
                        <td class="text-green">Pagado</td>     
                        <td>
                            <a href="{{route('verActaPP', $idCurso)}}" class="btn btn-warning">
                                <i class="far fa-edit" style="color:white"></i>
                            </a>
                            <a href="" class="btn btn-primary">
                                <i class="far fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Segundo parcial</td>
                        <td class="text-green">Pagado</td>     
                        <td>
                            <a href="{{route('verActaSP', $idCurso)}}" class="btn btn-warning">
                                <i class="far fa-edit" style="color:white"></i>
                            </a>
                            <a href="" class="btn btn-primary">
                                <i class="far fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tercver parcial</td>
                        <td class="text-green">Pagado</td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="far fa-edit" style="color:white"></i>
                            </a>
                            <a href="" class="btn btn-primary">
                                <i class="far fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
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
