


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
      <a href="{{route('cursosAsignados', $idDocente =Auth::user()->id)}}">
          <div class="card" style="background-color: rgba(12, 201, 5, 0.5); ">
              <div class="card-body">
              <p class="card-text"  id="text-card" style="font-weight: 600; font-size:1.5rem">
                  Mis cursos
              </p>
              <br>
              <p id="text-card" class="text-right"  style="font-size:30px">
                  <i class="fas fa-clipboard-list"></i>
              </p>
              </div>
          </div>
      </a>
  </div>
  
 
</div>