<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <title>boleta PDF</title>
    <style>
        td {
            font-size: 11px !important;
            padding: .1rem !important;

        }

        th {
            padding: 5px !important;
            font-size: 11px !important;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="text-left">
            <img src="images/Logo_itec.png" alt="" style="display: block; width:30%; height:auto">
        </div>
    </div>
    <br><br>
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="table-danger text-center">
                <tr>
                    <th>No. de control</th>
                    <th>Nombre</th>
                    <th>Modalidad</th>
                </tr>
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
        </table>
        <br>

        <table class="table table-bordered">
            <thead class="table-danger text-center">
                <tr>
                    <th>No</th>
                    <th>Materia</th>
                    <th>Cr</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $creditosCursados = 0;
                $creditosAprobados = 0;
                ?>
                @foreach ($alumnoCurso as $item)
                    <tr>
                        <td class="text-center">{{ $item->idMateria }}</td>
                        <td>{{ $item->nombreMateria }}</td>
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
            <table class="table table-bordered" style="">
                <thead class="table-danger text-center">
                    <tr>
                        <th>CREDITOS CURSADOS</th>
                        <th>CREDITOS APROBADOS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $creditosCursados }}</td>
                        <td class="text-center">{{ $creditosAprobados }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>





</body>

</html>
