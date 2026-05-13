<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Alumnos;
class StudentController extends Controller
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

    public function aspirantes(){
        $student = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->where('correoInstitucional', null)
        ->orWhere('correoInstitucional', '')
        ->get();

        
        return view('students.list_aspirantes', compact('student'));
    }

    public function list_students(){ 
       
        $student = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('estatus_alumno', 'alumnos.idEstatus', 'estatus_alumno.idEstatusAlumno')
        ->where('correoInstitucional' ,'!=', null, 'AND', 'correoInstitucional', '!=', " ")
        ->get();
        $estatus = DB::table('estatus_alumno')->get();
        return view('students.list_students', compact('student', 'estatus'));
    }

    public function viewInfo($idAlumno){
        $students = DB::table('alumnos')
        ->join('municipios', 'alumnos.idMunicipio', '=', 'municipios.idMunicipio')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('tipo_becas', 'alumnos.idTipoBeca', '=', 'tipo_becas.idTipoBeca')
        ->join('promedios', 'alumnos.idPromedio', '=', 'promedios.idPromedio')
        ->join('porcentajes', 'alumnos.idPorcentaje', '=', 'porcentajes.idPorcentaje')
        ->join('dependencias', 'alumnos.idDependencia', '=', 'dependencias.idDependencia')
        ->join('periodos', 'alumnos.idPeriodo', '=', 'periodos.idPeriodo')
        ->join('modalidad', 'alumnos.idModalidad', '=', 'modalidad.idModalidad')
        ->where('idAlumno', $idAlumno)
        ->get();

        $municipios = DB::table('municipios')->get();
        $periodos = DB::table('periodos')->get();
        $modalidades = DB::table('modalidad')->get();
        $programas = DB::table('programa_educativos')->get();
        $type_beca = DB::table('tipo_becas')->where('idTipoBeca', '!=', 1)->get();
        $promedios = DB::table('promedios')->where('idPromedio', '!=', 1)->get();
        $porcentajes = DB::table('porcentajes')->where('idPorcentaje', '!=', 1)->get();
        $dependencias = DB::table('dependencias')->where('idDependencia', '!=', 1)->get();
        return view('students.actions.viewInfo', 
                compact('students', 'municipios', 'type_beca', 'promedios', 'porcentajes', 
                'dependencias', 'programas', 'periodos', 'modalidades'));
    }

    public function updateInfo(Request $request , $idAlumno){

        if($request->correoInstitucional != null){
            if($search = DB::table('users')->where('email', $request->correoInstitucional)->get()){
                if($search->count() > 0){
                    foreach($search as $search){
                        $correo = $search->email;
                        $id = $search->id;
                    }
                    $sync = DB::table('alumnos')->where('idAlumno', $idAlumno)
                    ->update([
                        'idUsuario' => $id
                    ]);
                }else{
                    return back()->with('mensajeError', 'Error, este correo aun no ha sido registrado!');
                }
                
            }
        }
                   
        $updateInfo = Alumnos::where('idAlumno', $idAlumno)
        ->update([
            'nombre' => $request->nombre ,
            'apePaterno' => $request->apePaterno ,
            'apeMaterno' => $request->apeMaterno , 
            'edad' => $request->edad ,
            'fechaNacimiento' => $request->fecha ,
            'calle' => $request->calle ,
            'numCalle' => $request->numero,
            'colonia' => $request->colonia,
            'idMunicipio' => $request->municipio,
            'telFijo' => $request->telFijo,
            'telCelular' => $request->telCelular,
            'correoAlumno' =>$request->correo,
            'escEgreso' => $request->escEgreso,
            'generacion' => $request->generacion,
            'promedioEgreso' => $request->promEgreso,
            'idPeriodo' => $request->perioInicio,
            'idPrograma' => $request->programa,
            'idModalidad' => $request->modalidad,
            'correoInstitucional' => $request->correoInstitucional,
            'cartaCompromiso' => $request->check
        ]);
        if($request->tipoBeca == 1 || $request->tipoBeca == 5){
            $updateTipoBeca = Alumnos::where('idAlumno', $idAlumno)
            ->update([
                'idTipoBeca' => $request->tipoBeca,
                'idPromedio' => 1,
                'idPorcentaje' => 1,
                'idDependencia' => 1,
                'localidad' => null
            ]);
        }else if ($request->tipoBeca == 2){
            $updateTipoBeca = Alumnos::where('idAlumno', $idAlumno)
            ->update([
                'idTipoBeca' => $request->tipoBeca,
                'idPromedio' => $request->prom,
                'idPorcentaje' => $request->porc,
                'idDependencia' => 1,
                'localidad' => null
            ]);

        }else if($request->tipoBeca == 3){
            $updateTipoBeca = Alumnos::where('idAlumno', $idAlumno)
            ->update([
                'idTipoBeca' => $request->tipoBeca,
                'idPromedio' => 1,
                'idPorcentaje' => 1,
                'idDependencia' => $request->dependencia,
                'localidad' => null
            ]);
        }else if($request->tipoBeca == 4){
            $updateTipoBeca = Alumnos::where('idAlumno', $idAlumno)
            ->update([
                'idTipoBeca' => $request->tipoBeca,
                'idPromedio' => 1,
                'idPorcentaje' => 1,
                'idDependencia' => 1,
                'localidad' => $request->localidad
            ]);
        }       
        
        
        return back()->with('mensaje', 'Datos actualizados con éxito!');
    }

 

    

    public function documents($idAlumno){
        $student = DB::table('alumnos')
        ->where('alumnos.idAlumno', $idAlumno)
        ->join('documentos', 'alumnos.idAlumno', 'documentos.idAlumno')
        ->get();
        return view('students.actions.documents', compact('student'));
    }

    public function receptionDocuments($idAlumno){
        $student = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('modalidad', 'alumnos.idModalidad', '=', 'modalidad.idModalidad')
        ->where('idAlumno', $idAlumno)
        ->get();
        $fecha = date('d/m/Y');
        return view('students.actions.reception_documents', compact('student', 'fecha'));
    }

     
    public function download(Request $request ){
        $url = $request->urlpath;
        $pathToFile= public_path('\download\\'.$url);
        return response()->download($pathToFile);
    }

///////////////////////////Profile Student ///////////////////////////////////////////////////////////

public function boletaCourse($id){

    $courseStudent = DB::table('alumno_cursos')
                        ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                        ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                        ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                        ->where('alumnos.idUsuario', $id)
                        ->get();
    $datoAlumnoCurso = DB::table('alumno_cursos')
    ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
    ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
    ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
    ->join('materias', 'cursos.idMateria', 'materias.idMateria')
    ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
    ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
    ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
    ->where('alumnos.idUsuario', $id)
    ->limit(1)
    ->get();

    return view('profiles.students.califCourse', compact('courseStudent', 'datoAlumnoCurso'));
}

public function verEvaluacionDocente($id){

    $docenteCurso = DB::table('alumno_cursos')
    ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
    ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
    ->join('status', 'cursos.idEstatus', 'status.id')
    ->join('users', 'cursos.idDocente', 'users.id')
    ->where('alumnos.idUsuario', $id)
    ->where('cursos.idEstatus', 2)
    ->get();

    $pregunta1 = DB::table('banco_preguntas')->where('idPregunta', 1)->get();
    $pregunta2 = DB::table('banco_preguntas')->where('idPregunta', 2)->get();
    $pregunta3 = DB::table('banco_preguntas')->where('idPregunta', 3)->get();
    $pregunta4 = DB::table('banco_preguntas')->where('idPregunta', 4)->get();
    $pregunta5 = DB::table('banco_preguntas')->where('idPregunta', 5)->get();
    $pregunta6 = DB::table('banco_preguntas')->where('idPregunta', 6)->get();
    $pregunta7 = DB::table('banco_preguntas')->where('idPregunta', 7)->get();
    $pregunta8 = DB::table('banco_preguntas')->where('idPregunta', 8)->get();
    $pregunta9 = DB::table('banco_preguntas')->where('idPregunta', 9)->get();
    

    return view('profiles.students.ver.evaluacionDocente', compact('docenteCurso', 'pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9'));
}


public function deleteAspirante($id){
    DB::table('alumnos')->where('idAlumno', $id)->delete();
    return back()->with('delete', 'El usuario ha sido eliminado');
}

}