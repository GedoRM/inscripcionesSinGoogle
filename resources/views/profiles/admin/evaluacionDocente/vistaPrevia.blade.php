@extends('layouts.adminlte')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

@endsection

@section('header')

@endsection

@section('contenido')


    <div class="container-fluid">
        <div class="row">
            <div class="d-block m-auto">
                <div>
                    <h3>Iniciar</h3>
                </div>

            </div>
        </div>
    </div>
<div class="container">
    @foreach ($preguntas as $item)
{{$item->nombrePregunta}}


    @endforeach
</div>
    
    <div class="d-flex justify-content-center">
        {!! $preguntas->links() !!}
    </div> 
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

    <script>
        var stepper1Node = document.querySelector('#stepper1')
        var stepper1 = new Stepper(document.querySelector('#stepper1'))

        stepper1Node.addEventListener('show.bs-stepper', function(event) {
            console.warn('show.bs-stepper', event)
        })
        stepper1Node.addEventListener('shown.bs-stepper', function(event) {
            console.warn('shown.bs-stepper', event)
        })
    </script>
@endsection
