<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Alumnos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;    


class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clausulas = DB::table('users')
                        ->join('alumnos', 'users.id', 'alumnos.idUsuario')
                        ->join('programa_educativos', 'alumnos.idPrograma', 'programa_educativos.idPrograma')
                        ->join('periodos', 'alumnos.idPeriodo', 'periodos.idPeriodo')

                        ->where('id', Auth::user()->id)
                        ->get();
        $usuario = DB:: table('users')
                    ->join('alumnos', 'users.id', 'alumnos.idUsuario')
                    ->join('alumno_cursos', 'alumnos.idAlumno', 'alumno_cursos.idAlumno')  
                    ->join('materias', 'alumno_cursos.idCurso', 'materias.idMateria')
                    ->join('programa_educativos', 'alumnos.idPrograma', 'programa_educativos.idPrograma')
                    ->join('periodos', 'alumnos.idPeriodo', 'periodos.idPeriodo')
                    ->where('id', Auth::user()->id)
                    ->get();
        $alumnoCurso = DB::table('alumnos')
                            ->join('users', 'alumnos.idUsuario', 'users.id')
                            ->join('alumno_cursos', 'alumnos.idAlumno', 'alumno_cursos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                            
                            ->where('alumnos.idUsuario', Auth::user()->id)
                            ->get();

        ///////////////////Profile - Teacher ////////////////////////////////////////////////////
        $teacherCourse = DB::table('cursos')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                            ->where('id', Auth::user()->id)
                            ->get();
         
         
        $alumnos = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'alumnos.idModalidad', 'modalidad.idModalidad')
        ->where('correoInstitucional', '!=', null)
        ->get();
        
        
        $count = DB::table('notification_passes')
                    ->where('statusLectura', 0)
                    ->where('FK_ID_USER', Auth::user()->id)
                    ->join('notifpass_user', 'notification_passes.idNotifPass', 'notifpass_user.FK_ID_NOTIFICACION')
                    ->count();
        $notificacionesPass = DB::table('notification_passes')
                                    ->where('statusLectura', 0)
                                    ->where('FK_ID_USER', Auth::user()->id)
                                    ->orderBy('fechaEnvio', 'DESC')
                                    ->join('notifpass_user', 'notification_passes.idNotifPass', 'notifpass_user.FK_ID_NOTIFICACION')
                                    ->get();
        return view('home', compact('usuario', 'alumnoCurso', 'teacherCourse', 'clausulas', 'alumnos', 'notificacionesPass', 'count'));
    }
/*
    public function students($user_found){
        return view('homeStudent');
    }
*/
    public function no_permitido(){
        return "Acceso no permitido";
    }

 
}
