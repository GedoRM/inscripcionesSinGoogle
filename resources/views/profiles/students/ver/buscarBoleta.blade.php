@extends('layouts.adminlte')

@section('css')

@endsection

@section('header')

@endsection

@section('contenido')
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
    <br><br>
    <div class="container">
        <div id="resp">

        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).on('ready', function() {
            $("#cuatrimestre").on('change', function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('boleta',$id) }}",
                    data: $("#cuatri").serialize(),
                    success: function(data) {
                        $("#resp").html(data);
                    }
                });
            }); 
        });
    </script>
@endsection
