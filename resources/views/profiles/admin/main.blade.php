@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    <style>
        #text-card{
            color:white;
        }
    </style>
@endsection
@section('header')
    <h2>Inicio</h2>
@endsection 
<div class="row"> 
    <div class="col-12 col-md-4">
        <a href="{{route('verAlumnos')}}">
            <div class="card" style="background-color: rgba(0,142,210,0.5); ">
                <div class="card-body">
                <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                    Alumnos
                </p>
                <br>
                <p id="text-card" class="text-right" style="font-size:30px"><i class="fas fa-user-friends"></i></p>
                </div>
            </div>
        </a>  
    </div>
    <div class="col-12 col-md-4">
        <a href="#">
            <div class="card" style="background-color: rgba(12, 201, 5, 0.5); ">
                <div class="card-body">
                <p class="card-text"  id="text-card" style="font-weight: 600; font-size:1.5rem">
                    Cursos
                </p>
                <br>
                <p id="text-card" class="text-right"  style="font-size:30px">
                    <i class="fas fa-clipboard-list"></i>
                </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{route('list_materies')}}">
            <div class="card" style="background-color: rgba(210, 119, 0, 0.5); ">
                <div class="card-body">
                <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                    Materias
                </p>
                <br>
                <p id="text-card" class="text-right"  style="font-size:30px">
                    <i class="fas fa-book-open"></i>
                </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{route('list_teacher')}}">
            <div class="card" style="background-color: rgba(151, 0, 210, 0.5); ">
                <div class="card-body">
                <p class="card-text" id="text-card" style="font-weight: 600; font-size:1.5rem">
                    Profesores
                </p>
                <br>
                <p id="text-card" class="text-right"  style="font-size:30px"><i class="fas fa-chalkboard-teacher"></i></p>
                </div>
            </div>
        </a>
    </div>
</div>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection