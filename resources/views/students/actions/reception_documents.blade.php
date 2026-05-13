@extends('layouts.adminlte')

@section('header')
<h1 class="m-0 text-dark"><i class="fas fa-file-signature mr-3"></i>Documentos entregados</h1>    
@endsection

@section('contenido')
@foreach ($student as $date)
<nav class ="nav nav-tabs justify-content-center grey" style="margin-top: -10px">
    <li class="nav-item">
    <a id="datos" style="color:black" href="{{route('viewInfo', $date->idAlumno)}}" class="nav-link ">Datos</a>
    </li>
    <li class="nav-item">
    <a style="color:black" href="{{route('documents', $date->idAlumno)}}" class="nav-link">Documentos</a>
    </li>
    <li class="nav-item">
    <a href="{{route('reception', $date->idAlumno)}}" id="doc" class="nav-link active bg-blue">Recepción Documentos</a>
    </li>
  </nav>
<br><br>
<div class="container">
    <form class="ml-5" action="{{route('recepcionDocumentos',$date->idAlumno)}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="md-form">
                    <input class="form-control" id="nom" type="text" 
                    value="{{$date->apePaterno}} {{$date->apeMaterno}} {{$date->nombre}}" disabled>
                </div>
                <div class="md-form">
                    <input name="nombreAlumno" value="{{$date->apePaterno}} {{$date->apeMaterno}} {{$date->nombre}}" hidden>
                </div>
            </div>
            <div class="col-md-6 col-12">
            
            </div>
            <div class="col-md-2 col-12">
                <div class="md-form">
                    <input class="form-control" type="datetime" name="fecha" value="{{date('d/m/Y')}}">
                    <label>Fecha de entrega</label>
                </div>
            </div>
        
        </div>

        <div class="form-row">
            <div class="col-md-4 col-12">
                <div class="md-form">
                    <input class="form-control" id="programa" type="text" value="{{$date->nombrePrograma}}" disabled> 
                    <input name="programa" value="{{$date->nombrePrograma}}" hidden>      
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="md-form">
                    <input class="form-control" id="cuatri" type="number" name="cuatrimestre" min="1" max="9" placeholder="Cuatrimestre" required>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="md-form">
                    <input class="form-control" id="modalidad" type="text" value="{{$date->nombreModalidad}}" disabled>
                    <input name="modalidad" value="{{$date->nombreModalidad}}" hidden>
                </div>
            </div>
        </div>
        <br><br>
        <div class="form-row">
            <div class="col-md-5 col-12">
                <label>DOCUMENTOS:</label>
                
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="acta" name="actaOriginal" value="1" >
                    <label class="custom-control-label" for="acta">
                        Acta de nacimiento (Original)
                    </label>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="curp" name="curpOriginal" value="1"> 
                    <label class="custom-control-label" for="curp">
                        CURP (Original)
                    </label>
                </div>
                <br>
                <div class="custom-control custom-checkbox">    
                    <input class="custom-control-input" type="checkbox" id="certBachi" name="certificadoOriginal" value="1"> 
                    <label class="custom-control-label" for="certBachi">
                        Certificado de Bachillerato (Original)
                    </label>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="consEstud" name="constanciaOriginal" value="1"> 
                    <label class="custom-control-label" for="consEstud">
                        Constancia de estudio
                    </label>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="foto" name="fotoOriginal" value="1">
                    <label class="custom-control-label" for="foto">
                        Fotografías (4)
                    </label>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="ineAlum" name="ineAlumnoOriginal" value="1"> 
                    <label class="custom-control-label" for="ineAlum">
                        INE del alumno (Copia)
                    </label>    
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="ine_tu" name="ineTutorOriginal" value="1">
                    <label class="custom-control-label" for="ine_tu">
                        INE del padre/tutor (Copia)
                    </label> 
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="comprobante_d" name="comprobanteOriginal" value="1"> 
                    <label class="custom-control-label" for="comprobante_d">
                        Comprobante de Domicilio
                    </label>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <label>Observaciones:</label>
                <div class="md-form">
                    <textarea name="observaciones" id="obs" rows="12" cols="50"> </textarea>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6 text-center">
                <input class="form-control text-center" type="text" style="border: none;" name="recibe" value="{{Auth::user()->name}}"disabled >
                <input name="recibe" value="{{Auth::user()->name}}" hidden >
                
                <hr>
                <label><b>Recibe</b></label>
            </div>
            <div class="col-md-6 text-center">
                <input class="form-control text-center" type="text"  name="entrega" 
                    value="{{$date->apePaterno}} {{$date->apeMaterno}} {{$date->nombre}}" style="border: none; " disabled>
                    <input name="entrega" value="{{$date->apePaterno}} {{$date->apeMaterno}} {{$date->nombre}}" hidden>
                <hr>
                <label><b>Entrega</b></label>
            </div>
        </div>
        <br><br>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm" name="enviar">
                <i class="fas fa-download mr-3"></i>
                    Generar PDF
            </button>
        </div>          
    </form>
</div>

@endforeach

@endsection
