@extends('layouts.adminlte')

@section('css')
    <style>
        th {
            width: 250px;
            word-break: break-all;
            text-align: center;
        }

    </style>
@endsection

<!--------------PENDIENTE--------------->
@section('header')

@endsection

@section('contenido')
    <?php
    $cont = 1;
    $creditosAcreditados = 0;
    $creditosTotales = 0;
    ?>

    @foreach ($cuatrimestres as $item)
        <?php $creditosTotales = $creditosTotales + $item->creditos; ?>
    @endforeach

    <div class="container">
        {{$creditosTotales}}
        <div class="content-justify-center">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>CLAVE</th>
                        <th>NOMBRE DE LA MATERIA</th>
                        <th>CALIFICACIÓN</th>
                        <th>CR</th>
                    </tr>
                </thead>
                <tbody>
                    <td colspan="5" class="text-center">Primer cuatrimestre</td>
                    @foreach ($avanceReticular as $item)

                        <tr>
                            @if ($item->notaFinal >= 6)
                                <?php
                                $creditosAcreditados = $creditosAcreditados + $item->creditos;
                                ?>
                            @else
                                <?php
                                $creditosAcreditados = $creditosAcreditados + 0;
                                ?>
                            @endif
                            <td style="width: 5%" class="text-center">{{ $cont }}</td>
                            <td style="width: 10%">{{ $item->claveMateria }}</td>
                            <td>{{ $item->nombreMateria }}</td>
                            <td style="width: 20%" class="text-center">{{ $item->notaFinal }}</td>
                            <td style="width: 10%" class="text-center">{{ $item->creditos }}</td>
                        </tr>
                        @if ($cont == 5)
                            <td colspan="5" class="text-center">Segundo cuatrimestre</td>
                        @endif
                        @if ($cont == 10)
                            <td colspan="5" class="text-center">Tercer cuatrimestre</td>
                        @endif
                        @if ($cont == 15)
                            <td colspan="5" class="text-center">Cuarto cuatrimestre</td>
                        @endif
                        @if ($cont == 20)
                            <td colspan="5" class="text-center">Quinto cuatrimestre</td>
                        @endif
                        @if ($cont == 25)
                            <td colspan="5" class="text-center">Sexto cuatrimestre</td>
                        @endif
                        @if ($cont == 30)
                            <td colspan="5" class="text-center">Septimo cuatrimestre</td>
                        @endif
                        @if ($cont == 35)
                            <td colspan="5" class="text-center">Octavo cuatrimestre</td>
                        @endif
                        @if ($cont == 40)
                            <td colspan="5" class="text-center">Noveno cuatrimestre</td>
                        @endif
                        <?php $cont++; ?>
                    @endforeach
                </tbody>
            </table>

            <?php ?>

            <table class="table table-bordered d-block m-auto" style="width: 50%">
                <thead class="text-center">
                    <tr>
                        <th colspan="3">CRÉDITOS</th>
                    </tr>
                    <tr>
                        <th>ACREDITADOS</th>
                        <th>FALTANTES</th>
                        <th>TOTALES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td style="width: 33%">{{ $creditosAcreditados }}</td>
                        <td style="width: 33%">{{ $creditosFaltantes = $creditosTotales - $creditosAcreditados }}</td>
                        <td style="width: 33%">{{ $creditosTotales }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>


@endsection

@section('js')

@endsection
