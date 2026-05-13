<form action="{{route('boletaPDF', $id)}}" method="post">
    @csrf
    <table class="table table-bordered border-light table-sm">
        <thead class="table-danger text-center">
            <tr>
                <th>No. de control</th>
                <th>Nombre</th>
                <th>Modalidad</th>
        </thead>
        <tbody class="text-center">
            @foreach ($datoAlumnoCurso as $notas)
                <tr>
 
                    <td>{{ $notas->idAlumno }}</td>
                    <td>{{ $notas->nombre }} {{ $notas->apePaterno }} {{ $notas->apeMaterno }}</td>
                    <td>{{ $notas->nombreModalidad }}</td>

                </tr>
            @endforeach
        </tbody>
        <tr>
            <thead class="table-danger text-center">
                <tr>
                    <th>Cuatrimestre</th>
                    <th colspan="2">Licenciatura</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    @foreach ($datoAlumnoCurso as $data)
                        <td>{{ $data->numeroCuatrimestre }}</td>
                        <td colspan="2">{{ $data->nombrePrograma }}</td>
                    @endforeach

                </tr>
            </tbody>
        </tr>
    </table>
    <br>

    <table class="table table-bordered table-sm">
        <tr>
            <thead class="table-danger text-center">
                <th>No</th>
                <th>Materia</th>
                <th>Cr</th>
                <th>Calificación</th>
            </thead>
        </tr>
        <tbody>
            <?php
            $creditosCursados = 0;
            $creditosAprobados = 0;
            ?>
            @foreach ($alumnoCurso as $item)
                <tr>
                    <td class="text-center">{{ $item->idMateria }}</td>
                    <td>{{ $item->nombreMateria }}</td>
                    <input type="hidden" name="cuatrimestre" value="{{$item->idCuatrimestre}}">
                    <td class="text-center">{{ $item->creditos }}</td>
                    <td class="text-center">{{ $item->notaFinal }}</td>
                </tr>
                <?php
                $creditosCursados = $creditosCursados + $item->creditos;
                if ($item->notaFinal > 5) {
                    $creditosAprobados = $creditosAprobados + $item->creditos;
                } else {
                    $creditosAprobados = $creditosAprobados + 0;
                }
                ?>
            @endforeach
        </tbody>
    </table>
    <br><br><br>
    <div class="container">
        <table class="table table-bordered border-light table-sm d-block m-auto" style="width: 50%">
            <thead class="table-danger text-center">
                <tr>
                    <th style="width:2%">CREDITOS CURSADOS</th>
                    <th style="width:2%">CREDITOS APROBADOS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $creditosCursados }}</td>
                    <td class="text-center">{{ $creditosAprobados }}</td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <div class="text-center">
            <button type="submit" class="btn btn-light" style="border:1px solid rgba(75,75,75,0.3)"><i
                    style="color:black;" class="far fa-file-pdf fa-2x"></i></button>
        </div>
    </div>
</form>
