@extends('layouts.adminlte')

@section('header')
    
@endsection

@section('css')
    <style>
        #head{
            font-weight: 600;
            border-bottom: 2px solid;
            border-bottom-color: #d23907;  
        }
    </style>
@endsection

@section('contenido')
    <table class="table text-center table-striped">
        <thead>
            <th id="head">Concepto</th>
            <th id="head">Cantidad</th>
            <th id="head">Estatus</th>
            <th id="head">Fecha</th>
            <th id="head">Descripcion</th>
        </thead>
        <tbody>
            @foreach ($verPagos as $item)
            <tr>
                <td>{{$item->nombreConcepto}}</td>
                <td>MXN ${{$item->cantidad}}</td>

                @if ($item->estatusPago == "Pagado")
                <td style="color:green; font-weight:bold">{{$item->estatusPago}}</td>
                @else
                <td style="color:orange; font-weight:bold">{{$item->estatusPago}}</td>
                @endif
                
                <td>{{$item->fechaCaptura}}</td>
                <td>{{$item->descripcion}}</td>      
            </tr>  
            @endforeach
           
        </tbody>
    </table>
@endsection

@section('js')
    
@endsection