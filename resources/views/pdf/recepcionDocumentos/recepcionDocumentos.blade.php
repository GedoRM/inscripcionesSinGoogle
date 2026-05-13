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
    <!-- Material Design Bootstrap -->



    <title>Recepción de documentos PDF</title>
    <style>
        td {
            font-size: 12px;
        }
        body{
            margin-bottom:10px;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="text-left">
            <img src="images/Logo_itec.png" alt="" style="display: block; width:30%; height:auto">
        </div>
        <div class="text-right">
            <p> <strong>Fecha: </strong>{{ $data[0] }}</p>
        </div>
    </div>
    <h4 class="font-weight-bold text-center">Servicios Escolares</h4>
    <h5 class="font-weight-bold text-center">Recepción de Documentos</h5>
    <p><strong>Nombre del alumno: </strong>{{ $data[1] }}</p>
    <p><strong>Licenciatura: </strong>{{ $data[2] }}</p>
    <p><strong>Modalidad: </strong>{{ $data[3] }}</p>
    <p><strong>Cuatrimestre: </strong>{{ $data[4] }}</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2" class="text-center">
                    Documentos
                </th>
                <th colspan="1" class="text-center">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    @if ($item->actaOriginal == 1)
                        <td><input type="checkbox" class="custom-control" name="" id="" checked></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td colspan="1">Acta de nacimiento (Original)</td>
                    <td rowspan="8">{{ $item->observaciones }}</td>
                </tr>
                <tr>
                    @if ($item->curpOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>CURP</td>
                </tr>
                <tr>
                    @if ($item->certificadoOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>Certificado de Bachillerato</td>
                </tr>
                <tr>
                    @if ($item->constanciaOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>Constancia de Estudios</td>
                </tr>
                <tr>
                    @if ($item->fotoOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>Fotográfias (4)</td>
                </tr>
                <tr>
                    @if ($item->ineAlumnoOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>INE del alumno (Copia)</td>
                </tr>
                <tr>
                    @if ($item->ineTutorOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>INE del padre o tutor (Copia)</td>
                </tr>
                <tr>
                    @if ($item->comprobanteDomicilioOriginal == 1)
                        <td><input type="checkbox" name="" id="" checked style="padding-right: 20px"></td>
                    @else
                        <td><input type="checkbox" name="" id="" style="padding-right: 20px"></td>
                    @endif
                    <td>Comprobante de Domicilio</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <table class="w-100">
            <thead>
                <tr>
                    <th colspan="2" class="text-left"></th>
                    <th colspan="2" class="text-right"><p>{{ Auth::user()->name }}</p></th>
                </tr>
            </thead>
            <tbody>
                <td colspan="2" class="text-center">RECIBE</td>
                <td colspan="2" class="text-right" style="padding-right: 100px">ENTREGA</td>
            </tbody>
        </table>
    </div>
<br><br><br>
 
        <img src="images/pie_pdf.png" style="width:100%; left:25; top:740; position: absolute;">
 


</body>

</html>
