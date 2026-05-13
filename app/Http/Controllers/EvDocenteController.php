<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
class EvDocenteController extends Controller
{

    public function habilitar(Request $request){
        $habilitar = DB::table('permiso_ev_docentes')
                        ->update([
                            'permisoEvDocente' => $request->habilitarEvDocente
                        ]);
            return '<script>console.log($request->habilitadEvDocente)</script>';
    }
    public function index($id){
        $id = Crypt::decrypt($id);
        return view('profiles.students.evaluacionDocente.main', compact('id'));
    }
 
    public function pregunta1($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 1)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta1', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta2($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 2)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta2', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta3($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 3)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta3', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta4($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 4)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta4', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta5($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 5)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta5', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta6($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 6)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta6', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta7($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 7)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta7', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta8($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 8)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta8', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function pregunta9($id){

        $pregunta = DB::table('banco_preguntas')->where('idPregunta', 9)->get();
        $docenteCurso = DB::table('alumno_cursos')
                            ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                            ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->where('alumnos.idUsuario', Crypt::decrypt($id))
                            ->where('cursos.idEstatus', 2)
                            ->get();
        return view('profiles.students.evaluacionDocente.preguntas.pregunta9', compact('id', 'pregunta', 'docenteCurso'));
    }

    public function respPregunta(Request $request, $id){
        
        $respuestas = DB::table('calif_cursos')
                                ->where('FK_ID_PREGUNTA', $request->pregunta)
                                ->where('FK_ID_ALUCURSO', $request->idCurso)
                                ->count();
 
        if($respuestas > 0){
            $actualizarPuntuacion = DB::table('calif_cursos')
                                        ->where('FK_ID_PREGUNTA', $request->pregunta)
                                        ->where('FK_ID_ALUCURSO', $request->idCurso)
                                        ->update([
                                            'respuesta' => $request->valor
                                        ]);
        }else{
            $insertarRespuesta = DB::table('calif_cursos')
                                    ->insert([
                                        'FK_ID_PREGUNTA' => $request->pregunta,
                                        'FK_ID_ALUCURSO' => $request->idCurso,
                                        'respuesta' => $request->valor
                                    ]);
        }   
    } 

    public function finalizar($id){
        return view('profiles.students.evaluacionDocente.preguntas.final', compact('id'));
    }

}
