<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;   
use App\Models\User;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use App\Notifications\PassNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class AdminController extends Controller
{ 
 
    public function permisoCalificar(Request $request){
        $habilitar = DB::table('permiso_calificars')
                        ->update([
                            'permisoCalificar' => $request->habilitar
                        ]);
            return back();
    }
    public function verCursosActivos($id){
        $alumno = DB::table('alumnos')->where('idAlumno', $id)
        ->join('programa_educativos', 'alumnos.idPrograma', 'programa_educativos.idPrograma')
        ->join('modalidad', 'alumnos.idModalidad', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'alumnos.FK_ID_CUATRIMESTRE', 'cuatrimestres.idCuatrimestre')
        ->get();
        $cuatrimestres = DB::table('cuatrimestres')->orderBy('idCuatrimestre', 'ASC')->get();

        return view('profiles.admin.estudiantes.acciones.verCursosInscrito', compact('alumno', 'id', 'cuatrimestres'));   
    } 


    public function calificacionesCursoInscrito($idAlumno, $idCurso){
        $calificacionesCurso = DB::table('alumno_curso_notas')->where('idAlumnoCurso', $idCurso)
                                    ->join('alumno_cursos', 'alumno_curso_notas.idAlumnoCurso', 'alumno_cursos.idUserCourse')
                                    ->join('alumnos', 'alumno_cursos.idAlumno', 'alumnos.idAlumno')
                                    ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                                    ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                                    ->get();

        return view('profiles.admin.estudiantes.acciones.calificacionesCurso', compact('calificacionesCurso'));
    }

    public function buscarCursoPorCuatri(Request $request, $id){
        $alumnoCurso = DB::table('alumno_cursos')
                        ->where('alumno_cursos.idAlumno', $id)
                        ->where('materias.idCuatrimestre', $request->cuatrimestre)
                        ->join('cursos', 'alumno_cursos.idCurso', 'cursos.idCurso')
                        ->join('materias', 'cursos.idMateria', 'materias.idMateria')
                        ->join('cuatrimestres', 'materias.idCuatrimestre', 'cuatrimestres.idCuatrimestre')
                        ->join('alumno_curso_notas', 'alumno_cursos.idUserCourse', 'alumno_curso_notas.idAlumnoCurso')
                        ->orderBy('claveMateria', 'ASC')
                        ->get();

    return view('profiles.admin.estudiantes.acciones.cursoPorCuatri', compact('alumnoCurso', 'id'));
    }
   /* public function viewStudents(){
        $student = DB::table('alumnos')
                    ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
                    ->join('estatus_alumno', 'alumnos.idEstatus', 'estatus_alumno.idEstatusAlumno')
                    ->where('correoInstitucional' ,'!=', null, 'AND', 'correoInstitucional', '!=', " ")
                    ->get();
        return view('profiles.admin.students.viewStudents', compact('student'));
    }
*/
    public function verAlumnos(){
        $student = DB::table('alumnos')
                    ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
                    ->join('estatus_alumno', 'alumnos.idEstatus', 'estatus_alumno.idEstatusAlumno')
                    ->join('cuatrimestres', 'alumnos.FK_ID_CUATRIMESTRE', 'cuatrimestres.idCuatrimestre')
                    ->where('correoInstitucional' ,'!=', null, 'AND', 'correoInstitucional', '!=', " ")
                    ->get();
        $estatus = DB::table('estatus_alumno')->get();
        $cuatrimestres = DB::table('cuatrimestres')->get();

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
        return view('profiles.admin.estudiantes.verListaEstudiantes', compact('student', 'estatus', 'cuatrimestres', 'count', 'notificacionesPass'));
    }
    ////////////////////Seccion / Usuarios //////////////////////////////////////////////////////

    public function listaUsuarios(){

        $rol_user = DB::table('users')
        ->join('status', 'users.id_status', '=', 'status.id')
        ->leftJoin('role_user', 'users.id', '=','role_user.user_id')
        ->leftJoin('roles', 'role_user.role_id', '=','roles.id')
        ->select('users.id', 'name', 'name_rol', 'status', 'email')
        ->where('users.id', '!=', '1')
        ->get();
        $list_roles = DB::table('roles')->get();
        $list_status = DB::table('status')->limit(2)->get();
        return view('profiles.admin.usuarios.verListaUsuarios', compact('rol_user', 'list_roles', 'list_status'));
    }

    public function updateRyS( Request $request, $id){

        $update_status = DB::table('users')
        //->join('status', 'users.id_status', '=', 'status.id')
        ->join('role_user', 'users.id', 'role_user.user_id')
        ->where('role_user.user_id', '=', $id)
        ->update([
            'id_status' => $request->status,
            'role_id' => $request->roles
        ]);

        return back()->with('status_update', 'Cambios realizados correctamente');
    }
    
    public function update_rol( Request $request, $id){
        
            $update_rol = DB::table('role_user')
                            ->where('user_id', $id)
                            ->update(['role_id' => $request->roles]);
                            return  back()->with('rol_update', 'Rol actualizado con éxito!');
      //  }
    }
 
    public function deleteUser($id){
        if($id == 1){
            return back()->with('noDelete', 'Error! Este usuario no puede ser elimiado');
        }else{
            DB::table('users')->delete($id);
            return back()->with('delete', 'El usuario ha sido eliminado');
        }
        
    }
    //////////////////////////Seccion / Aspirasntes //////////////////////////////////////

    public function listaAspirantes(){
        $student = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->where('correoInstitucional', null)
        ->orWhere('correoInstitucional', '')
        ->get();
        return view('profiles.admin.aspirantes.verListaAspirantes', compact('student'));
    }

    public function perfilAspirante($idAlumno){
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

        $correoAlumnos = DB::table('role_user')
                            ->join('roles', 'role_user.role_id', 'roles.id')
                            ->join('users', 'role_user.user_id', 'users.id')
                            ->where('roles.id', '4')
                            ->get();


        return view('profiles.admin.aspirantes.acciones.perfilAspirante', 
                compact('students', 'municipios', 'type_beca', 'promedios', 'porcentajes', 
                'dependencias', 'programas', 'periodos', 'modalidades', 'correoAlumnos'));
    }

    /////////////////// Seccion / Alumnos /////////////////////////////////////////////

    public function verPerfil($idAlumno){
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
        $periodos = DB::table('periodos')->where('idPeriodo', '>', '2')->get();
        $modalidades = DB::table('modalidad')->get();
        $programas = DB::table('programa_educativos')->get();
        $type_beca = DB::table('tipo_becas')->where('idTipoBeca', '!=', 1)->get();
        $promedios = DB::table('promedios')->where('idPromedio', '!=', 1)->get();
        $porcentajes = DB::table('porcentajes')->where('idPorcentaje', '!=', 1)->get();
        $dependencias = DB::table('dependencias')->where('idDependencia', '!=', 1)->get();

        $correoAlumnos = DB::table('role_user')
                            ->join('roles', 'role_user.role_id', 'roles.id')
                            ->join('users', 'role_user.user_id', 'users.id')
                            ->where('roles.id', '4')
                            ->get();


        return view('profiles.admin.estudiantes.acciones.verPerfil', 
                compact('students', 'municipios', 'type_beca', 'promedios', 'porcentajes', 
                'dependencias', 'programas', 'periodos', 'modalidades', 'correoAlumnos'));
    }

    public function ActualizarInfo(Request $request, $idAlumno){
        
        if($request->correoInstitucional != 0){
            
            $existeCorreo = DB::table('alumnos')
            ->where('idUsuario', $request->correoInstitucional)->count();
            if($existeCorreo > 0){
                return back()->with('mensajeError', 'Error! Este correo ya está siendo utilizado. Favor de seleccionar otro.');
            }else{
                $actualizarUsuario = DB::table('alumnos')
                ->where('idAlumno', $idAlumno)
                ->update([
                    'idUsuario' => $request->correoInstitucional
                ]);
    
                $buscarCorreo = DB::table('alumnos')
                                    ->join('users', 'alumnos.idUsuario', 'users.id')
                                    ->where('idAlumno', $idAlumno)
                                        ->get();
                                        foreach($buscarCorreo as $item){
                                            $correo = $item->email;
                                        }
                $actualizarEmail = DB::table('alumnos')
                                    ->where('idAlumno', $idAlumno)
                                    ->update([
                                        'correoInstitucional' => $correo
                                    ]);               
                return back()->with('mensajeCorreo', 'Correo institucional actualizado con éxito!');
            }
            
        }
        $updateInfo = Alumnos::where('idAlumno', $idAlumno)
        ->update([
            'nombre' => $request->nombre ,
            'apePaterno' => $request->apePaterno ,
            'apeMaterno' => $request->apeMaterno , 
            'edad' => $request->edad,
            'curp' => $request->curp,
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
            //'correoInstitucional' => $request->correoInstitucional,
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
                'idPorcentaje' => $request->porc2,
                'idDependencia' => $request->dependencia,
                'localidad' => null
            ]);
        }else if($request->tipoBeca == 4){
            $updateTipoBeca = Alumnos::where('idAlumno', $idAlumno)
            ->update([
                'idTipoBeca' => $request->tipoBeca,
                'idPromedio' => 1,
                'idPorcentaje' => $request->porc2,
                'idDependencia' => 1,
                'localidad' => $request->localidad
            ]);
        }
        return back()->with('mensaje', 'Datos actualizados con éxito!');
        
    }

    public function actualizarStatus(Request $request, $id){
        $comparar = DB::table('alumnos')->where('idAlumno', $id)->get();
        foreach($comparar as $item){
            $idAlumno = $item->idAlumno;
            $idEstatus = $item->idEstatus;
            $cuatri = $item->FK_ID_CUATRIMESTRE;
        }
        if($request->idAlumno == $idAlumno && $request->estatus == $idEstatus && $request->cuatrimestre == $cuatri){
            return back()->with('noCambio', 'No se ha realizado ningún cambio');
        }
        $updateStatus = DB::table('alumnos')
                        ->where('idAlumno', $id)
                        ->update([
                            'idAlumno' => $request->idAlumno,
                            'idEstatus' => $request->estatus,
                            'FK_ID_CUATRIMESTRE' => $request->cuatrimestre
                            ]);
    
    return back()->with('cambio', 'Datos actualizados con éxito!');
}

    public function verDocumentos($idAlumno){
        $student = DB::table('alumnos')
        ->where('alumnos.idAlumno', $idAlumno)
        ->join('documentos', 'alumnos.idAlumno', 'documentos.idAlumno')
        ->get();
        return view('profiles.admin.estudiantes.acciones.documentos', compact('student'));
    }

    public function recepcionDocumentos($idAlumno){
        $student = DB::table('alumnos')
        ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('modalidad', 'alumnos.idModalidad', '=', 'modalidad.idModalidad')
        ->where('idAlumno', $idAlumno)
        ->get();
        $fecha = date('d/m/Y');
        return view('profiles.admin.estudiantes.acciones.recepcionDocumentos', compact('student', 'fecha'));
    }

    public function bancoPreguntas(){
        $preguntas = DB::table('banco_preguntas')
        ->orderBy('idPregunta', 'ASC')
        ->get();
        return view('profiles.admin.evaluacionDocente.bancoPreguntas', compact('preguntas'));
    }

    public function vistaPrevia(){
        $preguntas = DB::table('banco_preguntas')->paginate(1);

        return view('profiles.admin.evaluacionDocente.vistaPrevia', compact('preguntas'));
    }

    public function sinAsignar(){
        $sinAsignar = DB::table('role_user')->where('role_id', 1)
                            ->select('users.id as id', 'name', 'email', 'name_rol', 'status')
                            ->join('roles', 'role_user.role_id', 'roles.id')
                            ->join('users', 'role_user.user_id', 'users.id')
                            ->join('status', 'users.id_status', '=', 'status.id')                  
                            ->get();
        $list_roles = DB::table('roles')->get();
        $list_status = DB::table('status')->limit(2)->get();
        return view('profiles.admin.usuarios.sinAsignar', compact('sinAsignar', 'list_roles', 'list_status'));
    }

    public function alumnos(){
        $alumnos = DB::table('users')
                        ->select('users.id as id', 'name', 'email', 'name_rol', 'status')
                        ->where('role_id', 4)
                        ->join('role_user', 'users.id', 'role_user.user_id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->join('status', 'users.id_status', '=', 'status.id')
                        ->get();
       /* $alumnos = DB::table('role_user')->where('role_id', 4)
                            ->join('roles', 'role_user.role_id', 'roles.id')
                            ->join('users', 'role_user.user_id', 'users.id')
                            ->join('status', 'users.id_status', '=', 'status.id')                  
                            ->get();
        */
        $list_roles = DB::table('roles')->get();
        $list_status = DB::table('status')->limit(2)->get();
        return view('profiles.admin.usuarios.alumnos', compact('alumnos', 'list_roles', 'list_status'));
    }

    public function docentes(){
        $docentes = DB::table('role_user')->where('role_id', 5)
                            ->select('users.id as id', 'name', 'email', 'name_rol', 'status')
                            ->join('roles', 'role_user.role_id', 'roles.id')
                            ->join('users', 'role_user.user_id', 'users.id')
                            ->join('status', 'users.id_status', '=', 'status.id')                  
                            ->get();
        $list_roles = DB::table('roles')->get();
        $list_status = DB::table('status')->limit(2)->get();
        return view('profiles.admin.usuarios.docentes', compact('docentes', 'list_roles', 'list_status'));
        
    }

    public function cambiarContrasena($id){
        $usuario = DB::table('users')->where('id', $id)->get();
        foreach ($usuario as $usuario){
            $email = $usuario->email;
        }
        return view('profiles.admin.contrasena.cambiarContrasena', compact('id', 'email'));
    }

    public function updatePass(Request $request, $id){
        DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->contrasena),
                'forcePass' => '1'
            ]);
        return back();
    }
    public function forzar(Request $request, $id){

        $validarPass = $request->validate([
            'contrasena' => 'required|string|min:8'
        ]);


        DB::table('users')
        ->where('id', $id)
        ->update([
            'password' => Hash::make($request->contrasena),
            'forcePass' => '0'
        ]);
    return back();
    }

    public function generar(){
       return back()->with('generar', Str::random(8)); 
    }

    public function recuperarContrasena(Request $request){
        $correo = $request->email;
        $destinos = DB::table('role_user')
                        ->select('email', 'name', 'users.id as id')
                        ->where('role_id', 2)
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->get();
        Mail::to($destinos)->send(new ForgotPassword($correo));

        $notificar = DB::table('notification_passes')
                            ->insert([
                            'asunto' => "Recuperar contraseña",
                            'contenido' => $request->email,
                            'fechaEnvio' => now(),
                            'statusLectura' => 0,
                            ]);
        $ultimaNotif = DB::table('notification_passes')->select('idNotifPass')->limit(1)->orderBy('idNotifPass', 'DESC')->get();
        foreach ($ultimaNotif as $ultimaNotif){
            $item = $ultimaNotif->idNotifPass;
        }
        foreach($destinos as $destinos){
            $notifUser = DB::table('notifpass_user')
                            ->insert([
                                'FK_ID_USER' => $destinos->id,
                                'FK_ID_NOTIFICACION' => $item
                            ]);
        }
                            
    }

    public function leerMensaje($id){
        $leer = DB::table('notification_passes')
                    ->where('idNotifPass', $id)
                    ->update([
                        'statusLectura' => true
                    ]);
        return back();
    }

    public function estadisticas(){
        $countMunicipios = DB::table('alumnos')
                    ->select(DB::raw('COUNT(*) as count'))
                    ->join('municipios', 'alumnos.idMunicipio', 'municipios.idMunicipio')
                    ->groupBy(DB::raw('nombreMunicipio'))
                    ->pluck('count');
        $nombreMunicipios = DB::table('alumnos')
                            ->select(DB::raw('nombreMunicipio as nombre'))
                            ->join('municipios', 'alumnos.idMunicipio', 'municipios.idMunicipio')
                            ->groupBy(DB::raw('nombreMunicipio'))
                            ->orderBy('nombreMunicipio', 'ASC')
                            ->pluck('nombre');

        $datas = array();
        foreach ($countMunicipios as $item){
            $datas[] = $item;
        }

        $nombres = array();
        foreach($nombreMunicipios as $item){
            $nombres[] = $item;
        }

        $escuelas = DB::table('alumnos')
                        ->select(DB::raw('COUNT(*) as egreso'))
                        ->groupBy(DB::raw('escEgreso'))
                        ->pluck('egreso');
        $nombreEscuelas = DB::table('alumnos')
                            ->select(DB::raw('escEgreso as nombre'))
                            ->groupBy(DB::raw('escEgreso'))
                            ->pluck('nombre');
        $egreso = array();
        foreach($escuelas as $item){
            $egreso[] = $item;
        }

        $nombreEsc = array();
        foreach($nombreEscuelas as $item){
            $nombreEsc[] = $item;
        }
        
    return view('profiles.admin.estadisticas.main', get_defined_vars());
    }
} 