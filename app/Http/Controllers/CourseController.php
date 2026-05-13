<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{

    public function cursosContabilidadE(){
        $datos = DB::table('cursos')
        ->where('materias.idPrograma', 1)
        ->where('materias.idModalidad', 1)
        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
        ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
        ->join('users', 'cursos.idDocente', 'users.id')
        ->join('status', 'cursos.idEstatus', 'status.id')
        ->orderBy('claveMateria', 'ASC')
        ->get();

        $habilitado = DB::table('permiso_calificars')->get();
        foreach($habilitado as $item){
            $valor = $item->permisoCalificar;
        }
        $docentes = DB::table('role_user')
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->where('role_id', 5)
                        ->get();
        $materia = DB::table('materias')
                        ->where('idPrograma', 1)
                        ->where('idModalidad',1)
                        ->orderBy('claveMateria', 'ASC')
                        ->get();
        return view('course.contabilidad.escolarizado', compact('datos', 'valor', 'docentes', 'materia'));
    }

    public function cursosContabilidadM(){
        $datos = DB::table('cursos')
        ->where('materias.idPrograma', 1)
        ->where('materias.idModalidad', 2)
        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
        ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
        ->join('users', 'cursos.idDocente', 'users.id')
        ->join('status', 'cursos.idEstatus', 'status.id')
        ->orderBy('claveMateria', 'ASC')
        ->get();

        $habilitado = DB::table('permiso_calificars')->get();
        foreach($habilitado as $item){
            $valor = $item->permisoCalificar;
        }
        $docentes = DB::table('role_user')
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->where('role_id', 5)
                        ->get();
        $materia = DB::table('materias')
                        ->where('idPrograma', 1)
                        ->where('idModalidad',2)
                        ->orderBy('claveMateria', 'ASC')
                        ->get();
        return view('course.contabilidad.mixto', compact('datos', 'valor', 'docentes', 'materia'));
    }

    public function cursosDerechoE(){
        $datos = DB::table('cursos')
        ->where('materias.idPrograma', 2)
        ->where('materias.idModalidad', 1)
        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
        ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
        ->join('users', 'cursos.idDocente', 'users.id')
        ->join('status', 'cursos.idEstatus', 'status.id')
        ->orderBy('claveMateria', 'ASC')
        ->get();

        $habilitado = DB::table('permiso_calificars')->get();
        foreach($habilitado as $item){
            $valor = $item->permisoCalificar;
        }
        $docentes = DB::table('role_user')
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->where('role_id', 5)
                        ->get();
        $materia = DB::table('materias')
                        ->where('idPrograma', 2)
                        ->where('idModalidad',1)
                        ->orderBy('claveMateria', 'ASC')
                        ->get();
        return view('course.derecho.escolarizado', compact('datos', 'valor', 'docentes', 'materia'));
    }

    public function cursosDerechoM(){
        $datos = DB::table('cursos')
        ->where('materias.idPrograma', 2)
        ->where('materias.idModalidad', 2)
        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
        ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
        ->join('users', 'cursos.idDocente', 'users.id')
        ->join('status', 'cursos.idEstatus', 'status.id')
        ->orderBy('claveMateria', 'ASC')
        ->get();

        $habilitado = DB::table('permiso_calificars')->get();
        foreach($habilitado as $item){
            $valor = $item->permisoCalificar;
        }
        $docentes = DB::table('role_user')
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->where('role_id', 5)
                        ->get();
        $materia = DB::table('materias')
                        ->where('idPrograma', 2)
                        ->where('idModalidad',2)
                        ->orderBy('claveMateria', 'ASC')
                        ->get();
        return view('course.derecho.mixto', compact('datos', 'valor', 'docentes', 'materia'));
    }

    public function detailMaterie(Request $request){

        if($request->materia == 0){
            return "<script>
            public function(){
                $('#recargar2').load('#recarga2');
            }
            </script>";
        }else{ 
        $detail = DB::table('materias')
                    ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                    ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                    ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                    ->where('idMateria', $request->materia)
                    ->get();
                    foreach($detail as $materia){
                         $id = $materia->idMateria;
                         $programa = $materia->nombrePrograma;
                         $modalidad = $materia->nombreModalidad;
                         $cuatrimestre = $materia->numeroCuatrimestre;
                    }
        return  "<div class='md-form'>
                    <label>Cuatrimestre</label>
                    <input class='form-control' value='$cuatrimestre' name='cuatrimestre' disabled>
                </div>";
        } 
        
    }
    
    public function addCourse(Request $request){
        
        $hoy = date("Y-m-d");
        if($request->fecha_inicio){
            $insert = DB::table('cursos')
        
            ->insert([
                'idMateria' => $request->materia,
                'nombreGrupo' => $request->nombreGrupo,
                'idDocente' => $request->docente,
                'idEstatus' => 2,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_fin
                ]);
        }else if($request->fecha_inicio > $hoy){
            $insert = DB::table('cursos')
        
            ->insert([
                'idMateria' => $request->materia,
                'nombreGrupo' => $request->nombreGrupo,
                'idDocente' => $request->docente,
                'idEstatus' => 1,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_fin
                ]);
        }        
        return back()->with('cursoAñadido', 'Curso añadido con éxito!');        
    }

    public function enrollStudets($id){
        $detalleCurso = DB::table('cursos')
                                ->where('idCurso', $id)
                                ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                ->join('modalidad', 'materias.idModalidad', 'modalidad.idModalidad')
                                ->join('programa_educativos', 'materias.idPrograma', 'programa_educativos.idPrograma')
                                ->join('users', 'cursos.idDocente', 'users.id')
                                ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                                ->get();
        foreach($detalleCurso as $item){
           $idModalidad = $item->idModalidad;
           $idPrograma = $item->idPrograma;
           $idCuatrimestre = $item->idCuatrimestre;
        }
        $alumnos = DB::table('alumnos')
                        ->where('idUsuario', '!=', null)
                        ->where('idEstatus', 1)
                        ->where('idPrograma', $idPrograma)
                        ->where('idModalidad', $idModalidad)
                        ->where('FK_ID_CUATRIMESTRE', $idCuatrimestre)           
                        /*->whereNotExists(function($query){
                            $query->select(DB::raw(1))
                            ->from('alumno_cursos')
                            ->whereRaw('alumnos.idAlumno = alumno_cursos.idAlumno');
                        })*/
                        ->get();
        $inscritos = DB::table('alumno_cursos')
                        ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                        ->where('idCurso', $id)
                        ->get();
        $curso = DB::table('cursos')
                        ->where('idCurso', $id)
                        ->get();
        return view('course.actions.enrolleStudent', compact('alumnos', 'inscritos', 'curso', 'detalleCurso'));
    }

    public function enrolleToCourse(Request $request, $idCurso){
        $busqueda = DB::table('alumno_cursos')->where('idAlumno', $request->alumnos)->where('idCurso', $request->idCurso)
                    ->count();
        if(!empty($request->input('add'))){
            if($request->alumnos == 0){
                return back()->with('mensaje_error', 'No se ha seleccionado ningun usuario');
            }
            if($busqueda > 0){
                return back()->with('yaInscrito','Este usuario ya se encuentra inscrito en este curso');
            }
        
            $cont = 0;
        $inscritos = count($request->alumnos);
        while($cont < $inscritos){
          $lista  = $request->alumnos[$cont];
          $ingresar = DB::table('alumno_cursos')
            ->insert([
                'idCurso' => $idCurso,
                'idAlumno' => $lista
                ]);
                $cursoNota = DB::table('alumno_cursos')->select('idUserCourse')->orderBy('idUserCourse', 'DESC')->limit(1)->get();
        foreach($cursoNota as $item){
           $idCursoAlumno = $item->idUserCourse;
        }
        $insertCursoNota = DB::table('alumno_curso_notas')->insert([
            'idAlumnoCurso' => $idCursoAlumno
        ]);
            $cont++;            
        }
        
        return back()->with('mensaje', 'Usuarios inscritos con éxito');


        }else if(!empty($request->input('del'))){
            if($request->delAlu == 0){
                return back()->with('mensaje_error', 'No se ha seleccionado ningun usuario');
            }
            $cont = 0;
        $inscritos = count($request->delAlu);
        while($cont < $inscritos){
          $select  = $request->delAlu[$cont];
          $eliminar = DB::table('alumno_cursos')
          ->where([
              'idUserCourse' => $select
          ])
          ->delete();
            $cont++;            
        }        
        return back()->with('mensaje', 'Usuarios eliminado con éxito');
        }
        /*
        */
    }   
    public function eliminarCurso($idCurso){
        DB::table('cursos')
        ->where('idCurso', $idCurso)
        ->delete();
        return back()->with('cursoEliminado', 'Curso eliminado con éxito!');
    }
    
}