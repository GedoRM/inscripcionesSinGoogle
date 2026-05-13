<li class="nav-item has-treeview menu-close {{!Route::is('verAlumnos') ?: 'menu-open'}} 
    {{!Route::is('verPerfil') ?: 'menu-open'}} {{!Route::is('documents') ?: 'menu-open'}} {{!Route::is('recepcionDocumentos') ?: 'menu-open'}}">
    <a href="#" class="nav-link">
        <i class="fas fa-user-graduate nav-icon"></i>
      <p>
        Alumnos
        <i class="right fas fa-angle-left"></i>
      </p> 
    </a>
    <ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{route('verAlumnos')}} class="nav-link {{!Route::is('verAlumnos') ?: 'text-primary'}} 
                {{!Route::is('verPerfil') ?: 'text-primary'}} {{!Route::is('documentos') ?: 'text-primary'}} {{!Route::is('recepcionDocumentos') ?: 'text-primary'}} " >
                  <p>Lista de alumnos</p>
                </a>
              </li>
        </ul>
    </ul>
  </li>
  <li class="nav-item has-treeview menu-close {{!Route::is('list_teacher') ?: 'menu-open'}}">
    <a href="#" class="nav-link">
        <i class="fas fa-chalkboard-teacher nav-icon"></i>
      <p>
        Profesores
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li class="nav-item">
            <a href="{{route('list_teacher')}} " class="nav-link {{!Route::is('list_teacher') ?: 'text-primary'}}">
                  <p>Lista de profesores</p>
                </a>
              </li>
        </ul>
    </ul>
  </li>
  <li class="nav-item ml-1">
    <a href={{route('list_materies')}} class="nav-link">
        <i class="fas fa-clipboard-list mr-2"></i>
      <p>
        Materias
      </p>
    </a>
  </li>
 
  <li class="nav-item ml-1">
    <a href="{{route('list_course')}}" class="nav-link">
        <i class="fas fa-check-circle mr-2"></i>
      <p>
        Cursos
      </p>
    </a>
  </li>
