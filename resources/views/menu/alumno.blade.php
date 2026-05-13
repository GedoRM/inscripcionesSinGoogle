<li class="nav-item ml-1">
    <a href={{ route('miPerfil', Crypt::encrypt(Auth::user()->id)) }}
        class="nav-link {{ !Route::is('miPerfil') ?: 'text-primary' }}">
        <i class="fas fa-user mr-3"></i>
        <p>
            Mi perfil
        </p>
    </a>
</li>
<li
    class="nav-item has-treeview menu-close {{ !Route::is('avanceReticular') ?: 'menu-open' }} {{ !Route::is('calificacionesParciales') ?: 'menu-open' }}
    {{ !Route::is('historialPago') ?: 'menu-open' }} {{ !Route::is('buscarBoleta') ?: 'menu-open' }}">

    <a href="#" class="nav-link">
        <i class="fas fa-info-circle mr-3"></i>
        <p>
            Información Escolar
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{ route('avanceReticular', Crypt::encrypt(Auth::user()->id)) }}
                    class="nav-link {{ !Route::is('avanceReticular') ?: 'text-primary' }}">
                    <p>Avance Reticular</p>
                </a>
            </li>
        </ul>
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{ route('calificacionesParciales', Crypt::encrypt(Auth::user()->id)) }}
                    class="nav-link {{ !Route::is('calificacionesParciales') ?: 'text-primary' }}">
                    <p>Calificaciones Parciales</p>
                </a>
            </li>
        </ul>
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{ route('buscarBoleta', Crypt::encrypt(Auth::user()->id)) }}
                    class="nav-link {{ !Route::is('buscarBoleta') ?: 'text-primary' }}">
                    <p>Boletas</p>
                </a>
            </li>
        </ul>
        <ul style="list-style-type:none">
            <li class="nav-item ">
                <a href={{ route('historialPago', Crypt::encrypt(Auth::user()->id)) }}
                    class="nav-link {{ !Route::is('historialPago') ?: 'text-primary' }}">
                    <p>Historial de pagos</p>
                </a>
            </li>
        </ul>
    </ul>

</li>
<li class="nav-item ml-1">
    <a href={{ route('iniciarEvaluacion', Crypt::encrypt(Auth::user()->id)) }}
        class="nav-link {{ !Route::is('iniciarEvaluacion') ?: 'text-primary' }}">
        <i class="fas fa-clipboard-check mr-3"></i>
        <p>
            Evaluación docente
        </p>
    </a>
</li>
