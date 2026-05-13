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
            <tr>
                <td>Mensualidad</td>
                <td>MXN $1000.00</td>
                <td class="text-green">Pagado</td>
                <td>2021-05-06</td>
                <td>Mensualidad Mayo 2021</td>
            </tr>
            <tr>
                <td>Mensualidad</td>
                <td>MXN $1000.00</td>
                <td class="text-green">Pagado</td>
                <td>2021-05-06</td>
                <td>Mensualidad Mayo 2021</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('js')
    
@endsection