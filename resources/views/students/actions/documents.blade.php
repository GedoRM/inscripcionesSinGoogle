<style>
    p{
        font-weight: 400;
    }
</style>

@extends('layouts.adminlte')

@section('header')
    <h1 class="m-0 text-dark"><i class="fas fa-file-alt mr-3"></i>Documentos del alumno</h1>
@endsection

@section('contenido')
@foreach ($student as $date)
<nav class ="nav nav-tabs justify-content-center grey" style="margin-top: -10px">
    <li class="nav-item">
    <a style="color:black" id="datos" href="{{route('viewInfo', $date->idAlumno)}}" class="nav-link">Datos</a>
    </li>
    <li class="nav-item">
    <a  href="{{route('documents', $date->idAlumno)}}" class="nav-link active bg-blue">Documentos</a>
    </li>
    @can('Administrador')
    <li class="nav-item">
    <a style="color:black; " href="{{route('reception', $date->idAlumno)}}" id="doc" class="nav-link">Recepción Documentos</a>
    </li>
    @endcan
  </nav>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table p-5">
            <thead>
                <tr>
                    <th scope="col">
                        <label><p>Nombre del documento</p></label>
                    </th>
                    <th scope="col">
                        <label><p>Documento</p></label>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="acta_nacimiento"><p>Acta de nacimiento</p></label>
                    </td>
                   
                    @if ($date->actaNacimiento != null)
                        <td>
                            <a href='/download/{{$date->actaNacimiento}}'> {{$date->actaNacimiento}}</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <label for="const_estudio"><p>Constancia de estudios o Certificado de bachillerato</p></label>
                        
                    </td>
                    
                    @if ($date->constanciaEstudios != null)
                        <td>
                            <a href='/download/{{$date->constanciaEstudios}}'> {{$date->constanciaEstudios}}</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <label for="curp"><p>CURP</p></label>
                    </td>
                    
                    @if ($date->curp != null)
                        <td>
                            <a href='/download/{{$date->curp}}'> {{$date->curp}}</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td> 
                        <label for="ine"><p>INE o credencial escolar</p></label>
                    </td>
                    
                    @if ($date->ine != null)
                        <td>
                            <a href='/download/{{$date->ine}}'> {{$date->ine}}</a>
                        </td>
                    @endif 
                </tr>
                <tr>
                    <td>
                        <label for="ine_tutor"><p>INE del tutor</p></label>
                    </td>
                    
                    @if ($date->ineTutor != null)
                        <td>
                            <a href='/download/{{$date->ineTutor}}'> {{$date->ineTutor}}</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <label for="comp_domicilio"><p>Comprobante de domicilio</p></label>
                    </td>
                    
                    @if ($date->comprobanteDomicilio != null)
                        <td>
                            <a href='/download/{{$date->comprobanteDomicilio}}'> {{$date->comprobanteDomicilio}}</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <label for="foto"><p>Foto</p></label>
                    </td>
                    
                    @if ($date->foto != null)
                        <td>
                            <a href='/download/{{$date->foto}}'> {{$date->foto}}</a>
                        </td>
                    @endif               
                </tr>
                <tr>
                    <td>
                        <label for="pago"><p>Comprobante de pago</p></label>
                    </td>
                    
                    @if ($date->comprobantePago != null)
                        <td>
                            <a href='/download/{{$date->comprobantePago}}'> {{$date->comprobantePago}}</a>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>

</div>
@endforeach

@endsection

@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@endsection