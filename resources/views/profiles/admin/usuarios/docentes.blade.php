@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
    <h1 class="m-0 text-dark"><i class="fas fa-users mr-3"></i>Lista de usuarios</h1>
@endsection
@section('contenido')

    @if (session('status_update'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status_update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if (session('rol_update'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('rol_update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if (session('delete'))
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('noDelete'))
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('noDelete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <table id="wScroll" class="display table nowrap table-bordered" style="width: 100%">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>E-MAIL</th>
                <th>ROL</th>
                <th>STATUS</th>
                <td>ACCIONES</td>


            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($docentes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if ($item->id == 1)

                            <label for="" style="color:orangered">{{ $item->name_rol }}</label>

                        @else

                            <a href="" data-toggle="modal" data-target="#modalRolChange{{ $item->id }}">
                                {{ $item->name_rol }}
                            </a>
                            <div class="modal fade" id="modalRolChange{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('usuarios.update_rol', $item->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-bold text-wrap">Cambiar Rol de
                                                    {{ $item->name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right"
                                                        for="orangeForm-name">Selecciona un rol</label><br>
                                                    <select class="browser-default custom-select" name="roles" id="">
                                                        @foreach ($list_roles as $roles)
                                                            <option value="{{ $roles->id }}"> {{ $roles->name_rol }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="email" value="{{ $item->email }}"
                                                        style="display: none">
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        @endif
                    </td>
                    <td>
                        @if ($item->id == 1)
                            <label for="" style="color:orangered">{{ $item->status }}</label>
                        @else
                            <a href="" data-toggle="modal"
                                data-target="#modalStatusChange{{ $item->id }}">{{ $item->status }}
                            </a>
                            <div class="modal fade" id="modalStatusChange{{ $item->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action={{ route('usuarios.update_status', $item->id) }} method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 font-weight-bold text-wrap">Cambiar Estatus de
                                                    {{ $item->name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mx-3">
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right"
                                                        for="orangeForm-name">Selecciona un status</label><br>
                                                    <select class="browser-default custom-select" name="id_status" id="">
                                                        @foreach ($list_status as $status)
                                                            <option value="{{ $status->id }}"> {{ $status->status }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success btn-sm">Guardar
                                                    cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        @if ($item->id == 1)
                            <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button>
                        @else
                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#modalDelete{{ $item->id }}"><i class="fas fa-trash-alt"></i>
                            </a>
                            <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block; margin:auto">
                                            <i class="fas fa-exclamation-circle" style="font-size: 50px; color: red "></i>
                                            <br><br>
                                            <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este usuario?
                                            </h5>
                                        </div>
                                        <div class="modal-footer text-center d-block m-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('deleteUser', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-success"
                                                            data-mdb-dismiss="modal">
                                                            Aceptar
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                                        class="btn btn-secondary">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <a href="{{route('cambiarContrasena', $item->id)}}"><button class="btn btn-warning"><i style="color:white" class="fas fa-key"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset('js/dataTable.js') }}></script>
@endsection
