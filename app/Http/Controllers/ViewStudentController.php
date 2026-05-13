<?php

namespace App\Http\Controllers;
use App;
use DB;
use File;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class ViewStudentController extends Controller
{
    public function miPerfil($id){
        $users = DB::table('users')
        ->join('alumnos', 'users.id', 'alumnos.idUsuario')
        ->join('municipios', 'alumnos.idMunicipio', '=', 'municipios.idMunicipio')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('tipo_becas', 'alumnos.idTipoBeca', '=', 'tipo_becas.idTipoBeca')
        ->join('promedios', 'alumnos.idPromedio', '=', 'promedios.idPromedio')
        ->join('porcentajes', 'alumnos.idPorcentaje', '=', 'porcentajes.idPorcentaje')
        ->join('dependencias', 'alumnos.idDependencia', '=', 'dependencias.idDependencia')
        ->join('periodos', 'alumnos.idPeriodo', '=', 'periodos.idPeriodo')
        ->join('modalidad', 'alumnos.idModalidad', '=', 'modalidad.idModalidad')
 
        ->where('alumnos.idUsuario', Crypt::decrypt($id))
        ->get();
        return view('profiles.students.ver.profile', compact('users'));
    } 
    
    public function updatecCompromiso (Request $request, $idAlumno){
        $update = Alumnos::where('idAlumno', $idAlumno)
        ->update([
            'cartaCompromiso' => $request->cartaCompromiso
        ]);
        return back();
    }
 
    public function updateTyC (Request $request, $idAlumno){
        $update = Alumnos::where('idAlumno', $idAlumno)
        ->update([
            'termyCond' => $request->tyc
        ]);
        return back();
    }

    public function viewDocuments($id){
        $student = DB::table('users')
                        ->join('alumnos', 'users.id', 'alumnos.idUsuario')
                        ->join('documentos', 'alumnos.idAlumno', 'documentos.idAlumno')
                        ->where('idUsuario', Crypt::decrypt($id))->get();
        return view('profiles.students.ver.documents', compact('student'));
    }

    public function uploadDocuments(Request $request, $id){

        $ultimoId = DB::table('alumnos')->where('idUsuario', Crypt::decrypt($id))
                        ->join('documentos', 'alumnos.idAlumno', 'documentos.idAlumno')
                        ->get();
        foreach($ultimoId as $item){
            $columnaCurp = $item->curp;
            $idUser = $item->idAlumno;
            $nombre = $item->nombre;
            $apePat = $item->apePaterno;
            $apeMat = $item->apeMaterno;
        } 
        
            if($request->hasFile("actaNacimiento")){
                $file = $request->file("actaNacimiento");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'actaNacimiento' => $original
                ]);
            }
            if($request->hasFile("constanciaEstudios")){
                $file = $request->file("constanciaEstudios");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'constanciaEstudios' => $original
                ]);
            }
            if($request->hasFile("curp")){
                $file = $request->file("curp");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'docCurp' => $original
                ]);
            }
            if($request->hasFile("ine")){
                $file = $request->file("ine");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'ine' => $original
                ]);
            }
            if($request->hasFile("ineTutor")){
                $file = $request->file("ineTutor");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'ineTutor' => $original
                ]);
            }
            if($request->hasFile("comprobanteDomicilio")){
                $file = $request->file("comprobanteDomicilio");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'comprobanteDomicilio' => $original
                ]);
            }
            if($request->hasFile("foto")){
                $file = $request->file("foto");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'foto' => $original
                ]);
            }
            if($request->hasFile("comprobantePago")){
                $file = $request->file("comprobantePago");

                $original = $file->getClientOriginalName();
                
                $ruta = public_path("documentos/".$columnaCurp."/".$original);
                copy($file, $ruta);
                $update = DB::table('documentos')->where('idAlumno', $idUser)
                ->update([
                    'comprobantePago' => $original
                ]);
            }
            return back()->with('correcto', 'Archivo (s) cargado(s) con éxito!');
       /* }*/
            

           
    }

    public function download($documento, $id){
        $usuario = DB::table('alumnos')->where('idAlumno', Crypt::decrypt($id))->get();
        foreach ($usuario as $usuario){
            $curp = $usuario->curp;
        }
        $pathtoFile = public_path("documentos/".$curp."/".$documento);
        return response()->download($pathtoFile);
    }

    public function historialPagos($id){

        $verPagos = DB::table('pagos')
                        ->where('idUsuario', Crypt::decrypt($id))
                        ->join('alumnos', 'pagos.idAlumno', 'alumnos.idAlumno')
                        ->join('conceptos', 'pagos.idConcepto', 'conceptos.idConcepto')
                        ->join('estatus_pagos', 'pagos.idEstatus', 'estatus_pagos.idEstatusPago')
                        ->get();

        return view('profiles.students.ver.historialPago', compact('verPagos'));
    }

    public function boletaCourse(Request $request, $id){
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

        $adeudo = DB::table('users')
                        ->where('id', Crypt::decrypt($id))
                        ->where('pagos.idEstatus', '2')
                        ->join('alumnos', 'users.id', 'alumnos.idUsuario')
                        ->join('pagos', 'alumnos.idAlumno', 'pagos.idAlumno')
                        ->count();
        if($adeudo > 0){
            return view('profiles.students.ver.adeudo', compact('alumnoCurso', 'datoAlumnoCurso'));
        }else{
            return view('profiles.students.ver.boletaCuatrimestre', compact('alumnoCurso', 'datoAlumnoCurso', 'id'));
        }
        
    }

    public function avanceReticular($id){

        $avanceReticular = DB::table('alumno_curso_notas')
                                ->where('idUsuario', Crypt::decrypt($id))
                                ->join('alumno_cursos', 'alumno_curso_notas.idAlumnoCurso', 'alumno_cursos.idUserCourse')
                                ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                                ->get();

        $cuatrimestres = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', 'programa_educativos.idPrograma')
        ->join('materias', 'programa_educativos.idPrograma', 'materias.idPrograma')
        ->where('idUsuario', Crypt::decrypt($id))
        ->orderBy('idCuatrimestre', 'ASC')
        ->get();
        
        return view('profiles.students.ver.avanceReticular', compact('avanceReticular', 'cuatrimestres'));
    }

    public function calificacionesParciales($id){

        $calificacionesParciales = DB::table('alumno_curso_notas')->where('users.id', Crypt::decrypt($id))
                                    ->where('cursos.idEstatus', 2)
                                    ->join('alumno_cursos', 'alumno_curso_notas.idAlumnoCurso', 'alumno_cursos.idUserCourse')
                                    ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                    ->join('users', 'alumnos.idUsuario', 'users.id')
                                    ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                    ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                    ->get();

        $adeudo = DB::table('users')
                        ->where('id', Crypt::decrypt($id))
                        ->where('pagos.idEstatus', '2')
                        ->join('alumnos', 'users.id', 'alumnos.idUsuario')
                        ->join('pagos', 'alumnos.idAlumno', 'pagos.idAlumno')
                        ->count();

        if($adeudo > 0){
            return view('profiles.students.ver.adeudo', compact('calificacionesParciales', 'id'));
        }else{
            return view ('profiles.students.ver.calificacionesParciales', compact('calificacionesParciales', 'id'));
        }                
        
    }

    public function buscarBoleta($id){
        $cuatrimestres = DB::table('cuatrimestres')->orderBy('idCuatrimestre', 'ASC')->get();
        
        return view('profiles.students.ver.buscarBoleta', compact('cuatrimestres', 'id'));
    }

    
}
 