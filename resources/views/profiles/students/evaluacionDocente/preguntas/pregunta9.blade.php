@extends('layouts.adminlte')

@section('header')

@endsection

@section('css')

@endsection

@section('contenido')
    @foreach ($pregunta as $item)
        <div class="card m-3 p-3">
            <div class="header">
                <h3>
                    {{ $item->idPregunta . '. ' . $item->nombrePregunta }}
                </h3>
            </div>
            <div class="container-fluid">
                <form id="check">
                    <table class="table table-sm">
                        <thead class="text-center">
                            <tr>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($docenteCurso as $item)
                                <tr>
                                    <td>
                                        <p>{{ $item->name }}</p>
                                    </td>
                                    <td>
                                        <textarea name="{{ $item->idCurso }}" id="" cols="30" rows="1"></textarea>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    @endforeach
    <div class="container">
        <div class="text-right">
            <a href="{{ route('pregunta4', $id) }}">
                <button id="siguiente" class="btn btn-primary" disabled="true">
                    Finalizar
                </button>
            </a>
        </div>
    </div>
    <div id="res">

    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {     
            $("input:radio").attr("checked", false);
            $("#siguiente").attr("disabled", true);
            $('body #radios input').on('click', function() {
                var idCurso = $(this).attr('name');
                var value = $(this).attr('value');
                var pregunta = $("#pregunta").val();
                if ($("input[type=radio]:checked").size() == 5) {
                    $("#siguiente").attr("disabled", false);
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('res_pregunta', Crypt::encrypt($id)) }}",
                    data: {
                        valor: value,
                        idCurso: idCurso,
                        pregunta: pregunta,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        $("#res").html(res);
                    }
                })
            })
        })
    </script>
@endsection
