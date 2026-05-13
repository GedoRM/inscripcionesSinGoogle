<?php

namespace App\Http\Controllers;
use DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PDFController extends Controller
{
    public function recepcionDocumentosPDF(Request $request, $id){
        $usuario = DB::table('recepcion_documentos')->where('idAlumno', $id)->count();
        if($usuario > 0){
            $update = DB::table('recepcion_documentos')->where('idAlumno', $id)
                            ->update([
                                'actaOriginal' => $request->actaOriginal,
                                'curpOriginal' => $request->curpOriginal,
                                'certificadoOriginal' => $request->certificadoOriginal,
                                'constanciaOriginal' => $request->constanciaOriginal,
                                'fotoOriginal' => $request->fotoOriginal,
                                'ineAlumnoOriginal' => $request->ineAlumnoOriginal,
                                'ineTutorOriginal' => $request->ineTutorOriginal,
                                'comprobanteDomicilioOriginal' => $request->comprobanteOriginal,
                                'observaciones' => $request->observaciones,
                            ]);
        }else{
            $insert = DB::table('recepcion_documentos')
                            ->insert([
                                'actaOriginal' => $request->actaOriginal,
                                'curpOriginal' => $request->curpOriginal,
                                'certificadoOriginal' => $request->certificadoOriginal,
                                'constanciaOriginal' => $request->constanciaOriginal,
                                'fotoOriginal' => $request->fotoOriginal,
                                'ineAlumnoOriginal' => $request->ineAlumnoOriginal,
                                'ineTutorOriginal' => $request->ineTutorOriginal,
                                'comprobanteDomicilioOriginal' => $request->comprobanteOriginal,
                                'observaciones' => $request->observaciones,
                                'idAlumno' => $id,
                            ]);
        }
        $datos = DB::table('recepcion_documentos')->where('idAlumno', $id)->get();
        $data = [  
                    $request->fecha, $request->nombreAlumno, 
                    $request->programa, $request->modalidad, 
                    $request->cuatrimestre, $request->recibe,
                    $request->entrega
                ];
        $pdf = \PDF::loadView('pdf.recepcionDocumentos.recepcionDocumentos', compact('datos', 'data'));
        return $pdf->stream('recepcionDocumentos.pdf');
    }

    public function boletaPDF(Request $request, $id){

        $datoAlumnoCurso = DB::table('alumno_cursos')
        ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
        ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
        ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
        ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
        ->where('alumnos.idUsuario', Crypt::decrypt($id))
        ->limit(1)
        ->get();
        $alumnoCurso = DB::table('alumno_curso_notas')
                        ->where('alumnos.idUsuario', Crypt::decrypt($id))
                        ->where('materias.idCuatrimestre', $request->cuatrimestre)
                        ->join('alumno_cursos', 'alumno_curso_notas.idAlumnoCurso', 'alumno_cursos.idUserCourse')
                        ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                        ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                        ->orderBy('claveMateria', 'ASC')
                        ->get();

        $creditosPorCuatri = DB::table('materias')
                                ->where('idCuatrimestre', $request->cuatrimestre)
                                ->get();

        $pdf = \PDF::loadView('pdf.boletas/boletaPDF', compact('datoAlumnoCurso', 'alumnoCurso', 'creditosPorCuatri'));
        return $pdf->stream('boleta.pdf');
    }
}
