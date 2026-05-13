@extends('layouts.adminlte')

@section('header')

@endsection

@section('css')

@endsection

@section('contenido')
    @foreach ($pregunta as $pregunta)
        <div class="card m-3 p-3">
            <div class="header">
                <h3>
                    {{ $pregunta->idPregunta . '. ' . $pregunta->nombrePregunta }}
                </h3>
            </div>
            <div class="container-fluid">
                <form id="check">
                    <table class="table table-sm w-100">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Para nada</th>
                                <th>Un poco</th>
                                <th>Algo</th>
                                <th>Mucho</th>
                                <th>Una enorme cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($docenteCurso as $item)
                                <tr>
                                    <td>
                                        <p>{{ $item->name }}</p>
                                        <input type="hidden" name="idCurso" id="idCurso"
                                            value="{{ $item->idUserCourse }}">
                                        <input type="hidden" name="pregunta" id="pregunta"
                                            value="{{ $pregunta->idPregunta }}">
                                    </td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <td>
                                            <div id="radios" class="custom-control custom-radio">
                                                <input type="radio" class="radio custom-control-input"
                                                    name="{{ $item->idUserCourse }}"
                                                    id="p1{{ $item->idUserCourse . $i }}" value="{{ $i }}">
                                                <label class="custom-control-label"
                                                    for="p1{{ $item->idUserCourse . $i }}"></label>
                                            </div>
                                        </td>
                                    @endfor
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
            <a href="{{ route('pregunta7', $id) }}"> 
                <button id="siguiente" class="btn btn-primary" disabled="true">
                    Siguiente
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
