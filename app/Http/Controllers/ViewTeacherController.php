<?php

namespace App\Http\Controllers;
use App;
use DB;
use Luecano\NumeroALetras\NumeroALetras;


use Illuminate\Http\Request;
class ViewTeacherController extends Controller
{
     /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        //
    }

    public function detail($id){
        
        $detailCourse = DB::table('cursos')
                        ->join('alumno_cursos', 'cursos.idCurso', 'alumno_cursos.idCurso')
                        ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                        ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                        ->where('cursos.idCurso', $id)
                        ->get();

        return view('profiles.teacher.ver.detailCourse', compact('detailCourse'));
    }

    public function cursosAsignados($id){
        $maestroCurso = DB::table('cursos')
                            ->where('idDocente', $id)
                            ->join('users', 'cursos.idDocente', 'users.id')
                            ->join('status', 'cursos.idEstatus', 'status.id')
                            ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                            ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                            ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                            ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                            ->get();
        return view('profiles.teacher.ver.cursosAsignados', compact('maestroCurso', 'id'));
    }
 
    public function inscritosCurso($idDocente, $idCurso){
        $inscritosCurso = DB::table('alumno_cursos')
                                ->where('alumno_cursos.idCurso', $idCurso)
                                ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                                ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                                ->get();

        $detallesMateria = DB::table('materias')
                                ->where('idCurso', $idCurso)
                                ->join('cursos', 'materias.idMateria', 'cursos.idMateria')
                                ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                                ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre') 
                                ->get();
        
        $permiso = DB::table('permiso_calificars')->get();
                    foreach($permiso as $item){
                                $valor = $item->permisoCalificar;
                    }             
        return view('profiles.teacher.ver.inscritosCurso', compact('inscritosCurso', 'detallesMateria', 'idCurso', 'valor'));
    }

    public function actaCurso($idDocente, $idCurso){            
        return view('profiles.teacher.ver.actaCurso', compact('idCurso'));
    } 

    public function actaPrimerParcial($idCurso){
        $inscritosCurso = DB::table('alumno_cursos')
                                ->where('alumno_cursos.idCurso', $idCurso)
                                ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                                ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                                ->get();

        $detallesMateria = DB::table('materias')
                                ->where('idCurso', $idCurso)
                                ->join('cursos', 'materias.idMateria', 'cursos.idMateria')
                                ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                                ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre') 
                                ->join('users', 'cursos.idDocente', 'users.id')
                                ->get();
        
        $permiso = DB::table('permiso_calificars')->get();
                    foreach($permiso as $item){
                                $valor = $item->permisoCalificar;
                    }
        return view('profiles.teacher.actas.primerParcial', compact('inscritosCurso', 'detallesMateria', 'permiso', 'idCurso', 'valor'));
    }

    public function actaSegundoParcial($idCurso){
        $inscritosCurso = DB::table('alumno_cursos')
                                ->where('alumno_cursos.idCurso', $idCurso)
                                ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                                ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                                ->get();

        $detallesMateria = DB::table('materias')
                                ->where('idCurso', $idCurso)
                                ->join('cursos', 'materias.idMateria', 'cursos.idMateria')
                                ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                                ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre') 
                                ->join('users', 'cursos.idDocente', 'users.id')
                                ->get();
        
        $permiso = DB::table('permiso_calificars')->get();
                    foreach($permiso as $item){
                                $valor = $item->permisoCalificar;
                    }
        return view('profiles.teacher.actas.segundoParcial', compact('inscritosCurso', 'detallesMateria', 'permiso', 'idCurso', 'valor'));
    }

    public function calificar(Request $request, $idUserCourse){
        if(isset($request->primer)){
            return "Se va a calificar el primer parcial";
        }
        if(isset($request->segundo)){
            return "Se va a calificar el segundo parcial";
        }
       /* $update = DB::table('alumno_curso_notas')
                        ->where('idAlumnoCurso', $idUserCourse)
                        ->update([
                            'nota1' => $request->nota1,
                            'falta1' => $request->falta1 ,
                            'nota2' => $request-> nota2,
                            'falta2' => $request-> falta2,
                            'nota3' => $request-> nota3,
                            'falta3' => $request-> falta3,
                            'notaFinal' => $request->final,
                            'letra' => $request->letras,
                        ]);
                    return back();
*/
/*$buscarCalificaciones = DB::table('alumno_curso_notas')->where('idAlumnoCursoNota', $idUserCourse)->get();
foreach($buscarCalificaciones as $item){
    if($item->nota1 == null || $item->falta1 == null){
        if(isset($request->nota1)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'nota1' => $request->nota1,
                    ]);
        }
        if(isset($request->falta1)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'falta1' => $request->falta1,
                    ]);    
        }
            return redirect()->back()->with('mensajeCorrecto', 'Calificaciones del primer parcial actualizados con éxito');

    }elseif($item->nota2 == null || $item->falta2 == null){
        if(isset($request->nota2)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'nota2' => $request->nota2,
                    ]);       
        }
        if(isset($request->falta2)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'falta2' => $request->falta2,
                    ]);
        }
            return redirect()->back()->with('mensajeCorrecto', 'Calificaciones del segundo parcial actualizados con éxito');
           
            
    }elseif($item->nota3 == null || $item->falta3 == null){
        if(isset($request->nota3)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'nota3' => $request->nota3,
                    ]);
        }
        if(isset($request->falta3)){
            $update = DB::table('alumno_curso_notas')
            ->where('idAlumnoCursoNota', $idUserCourse)
            ->update([
                        'falta3' => $request->falta3
                    ]);
        }

        $promedio = DB::table('alumno_curso_notas')->where('idAlumnoCursoNota', $idUserCourse)->get();
        foreach($promedio as $item2){
        $notaFinal = round(($item2->nota1+$item2->nota2+$item2->nota3)/3);
        $formatter = new NumeroALetras();
                        $formatter->conector = 'punto';
                        $letra = strtolower($formatter->toString($notaFinal));
        $updateFinal = DB::table('alumno_curso_notas')
                        ->where('idAlumnoCursoNota', $idUserCourse)
                        ->update([
                            'notaFinal' => $notaFinal,
                            'letra' => $letra
                            ]);                     
      }
        
    }
        
}
return redirect()->back()->with('mensajeCorrecto', 'Calificaciones del tercer parcial actualizados con éxito');*/
      


    }
}