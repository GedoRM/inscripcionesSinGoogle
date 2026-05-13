@extends('layouts.adminlte')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
    @foreach ($alumno as $item)
        <h1 class="m-0 text-dark"><i class="fas fa-user mr-3"></i>
            {{ $item->nombre . ' ' . $item->apePaterno . ' ' . $item->apeMaterno }}</h1>
    @endforeach
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-4">
            @foreach ($alumno as $item)
                <h5>Modalidad: {{ $item->nombreModalidad }}</h5>
                <h5>Programa: {{ $item->nombrePrograma }}</h5>
                <h5>Cuatrimestre: {{ $item->numeroCuatrimestre }}</h5>
            @endforeach

        </div>
    </div>
    <div class="container">

        <div class="col-md-4 d-block m-auto">
            <form id="cuatri">
                @csrf
                <select name="cuatrimestre" class="browser-default custom-select" id="cuatrimestre">
                    <option value=" " selected disabled>Seleciona un cuatrimestre</option>
                    @foreach ($cuatrimestres as $item)
                        <option value="{{ $item->idCuatrimestre }}">{{ $item->numeroCuatrimestre }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <br><br>
    <div id="resp">

    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src={{ asset('js/dataTable.js') }}></script>
    <script>
        $(document).on('ready', function() {
            $("#cuatrimestre").on('change', function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('buscarCursoPorCuatri', $id) }}",
                    data: $("#cuatri").serialize(),
                    success: function(data) {
                        $("#resp").html(data);
                    }
                });
            });
        });
    </script>
@endsection
 