<li
    class="nav-item has-treeview menu-close {{ !Route::is('listaUsuarios') ?: 'menu-open' }} {{ !Route::is('sinAsignar') ?: 'menu-open' }} 
    {{ !Route::is('alumnos') ?: 'menu-open' }} {{ !Route::is('docentes') ?: 'menu-open' }} {{ !Route::is('listaAspirantes') ?: 'menu-open' }}">

    <a href="#" class="nav-link">
        <i class="fas fa-users nav-icon"></i>
        <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <!--<ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{ route('listaUsuarios') }}
                    class="nav-link {{ !Route::is('listaUsuarios') ?: 'text-primary' }}">
                    <p>Lista de usuarios</p>
                    <i class="right fas fa-angle-left"></i>
                </a>-->
    <ul class="nav nav-treeview">
        <ul style="list-style-type: none">
            <li class="nav-item">
                <a href="{{ route('sinAsignar') }}"
                    class="nav-link {{ !Route::is('sinAsignar') ?: 'text-primary' }}">
                    <p>Sin asignar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('alumnos') }}" class="nav-link {{ !Route::is('alumnos') ?: 'text-primary' }}">
                    <p>Alumnos</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('docentes') }}" class="nav-link {{ !Route::is('docentes') ?: 'text-primary' }}">
                    <p>Docentes</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href={{ route('listaAspirantes') }}
                    class="nav-link {{ !Route::is('listaAspirantes') ?: 'text-primary' }}">
                    <p>Aspirantes</p>
                </a>
            </li>
        </ul>

    </ul>
    <!--</li>
        </ul>
        
    </ul>-->
</li>
<li
    class="nav-item has-treeview menu-close {{ !Route::is('verAlumnos') ?: 'menu-open' }} 
    {{ !Route::is('verPerfil') ?: 'menu-open' }} {{ !Route::is('documentos') ?: 'menu-open' }} {{ !Route::is('recepcionDocumentos') ?: 'menu-open' }}">
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
                <a href="{{ route('verAlumnos') }}"
                    class="nav-link {{ !Route::is('verAlumnos') ?: 'text-primary' }} 
                {{ !Route::is('verPerfil') ?: 'text-primary' }} {{ !Route::is('documentos') ?: 'text-primary' }} {{ !Route::is('recepcionDocumentos') ?: 'text-primary' }} ">
                    <p>Lista de alumnos</p>
                </a>
            </li>
        </ul>
    </ul>
</li>
<li class="nav-item has-treeview menu-close {{ !Route::is('list_teacher') ?: 'menu-open' }}">
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
                <a href="{{ route('list_teacher') }} "
                    class="nav-link {{ !Route::is('list_teacher') ?: 'text-primary' }}">
                    <p>Lista de profesores</p>
                </a>
            </li>
        </ul>
    </ul>
</li>
<li class="nav-item ml-1">
    <a href={{ route('list_materies') }} class="nav-link {{ !Route::is('list_materies') ?: 'text-primary' }}">
        <i class="fas fa-clipboard-list mr-2"></i>
        <p>
            Materias
        </p>
    </a>
</li>
<li
    class="nav-item has-treeview menu-close {{ !Route::is('cursosContabilidadE') ?: 'menu-open' }} {{ !Route::is('cursosDerechoE') ?: 'menu-open' }} {{ !Route::is('cursosContabilidadM') ?: 'menu-open' }} {{ !Route::is('cursosDerechoM') ?: 'menu-open' }}">
    <a href="#" class="nav-link">
        <i class="fas fa-check-circle mr-2"></i>
        <p>
            Cursos
        </p>
        <i class="right fas fa-angle-left"></i>
    </a>
    <ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li
                class="nav-item has-treeview menu-close {{ !Route::is('cursosContabilidadE') ?: 'menu-open' }} {{ !Route::is('cursosContabilidadM') ?: 'menu-open' }} ">
                <a href="#" class="nav-link ">
                    <i class="right fas fa-angle-left"></i>
                    <p>Contabilidad</p>
                </a>
                <ul class="nav nav-treeview">
                    <ul style="list-style-type:none">
                        <li class="nav-item ">
                            <a href="{{ route('cursosContabilidadE') }}"
                                class="nav-link {{ !Route::is('cursosContabilidadE') ?: 'text-primary' }}">
                                <p>Escolarizada</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('cursosContabilidadM') }}" class="nav-link {{ !Route::is('cursosContabilidadM') ?: 'text-primary' }}">
                                <p>Mixta</p>
                            </a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li
                class="nav-item has-treeview menu-close {{ !Route::is('cursosDerechoE') ?: 'menu-open' }} {{ !Route::is('cursosDerechoM') ?: 'menu-open' }}">
                <a href="#" class="nav-link">
                    <p>Derecho </p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <ul style="list-style-type:none">
                        <li class="nav-item ">
                            <a href="{{ route('cursosDerechoE') }}"
                                class="nav-link {{ !Route::is('cursosDerechoE') ?: 'text-primary' }}">
                                <p>Escolarizada</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('cursosDerechoM') }}" class="nav-link {{ !Route::is('cursosDerechoM') ?: 'text-primary' }}">
                                <p>Mixta</p>
                            </a>
                        </li>
                    </ul>
                </ul>
            </li>
        </ul>

    </ul>
</li>
<!--<li
    class="nav-item has-treeview menu-close {{ !Route::is('bancoPreguntas') ?: 'menu-open' }} {{ !Route::is('vistaPrevia') ?: 'menu-open' }}">
    <a href="#" class="nav-link">
        <i class="fas fa-clipboard-check mr-2"></i>
        <p>
            Evaluación docente
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li class="nav-item">
                <a href="{{ route('bancoPreguntas') }} "
                    class="nav-link {{ !Route::is('bancoPreguntas') ?: 'text-primary' }}">
                    <p>Banco de preguntas</p>
                </a>
            </li>
        </ul>
        <ul style="list-style-type:none">
            <li class="nav-item">
                <a href="{{ route('vistaPrevia', ['numero' => '1']) }} "
                    class="nav-link {{ !Route::is('vistaPrevia') ?: 'text-primary' }}">
                    <p>Vista previa</p>
                </a>
            </li>
        </ul>
    </ul>
</li>-->

<li class="nav-item ml-1">
    <a href={{ route('estadisticas') }} class="nav-link {{ !Route::is('estadisticas') ?: 'text-primary' }}">
        <i class="fas fa-chart-bar mr-2"></i>
        <p>
            Estadisticas
        </p>
    </a>
</li>
