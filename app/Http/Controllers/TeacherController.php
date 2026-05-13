<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
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

    public function list_teacher(){
        $list_teacher = DB::table('role_user')
        ->join('users', 'role_user.user_id', 'users.id')
        ->join('roles', 'role_user.role_id', 'roles.id')
        ->join('status', 'users.id_status', 'status.id')
        ->where('role_id', 5)
        ->get();


        $list_users = DB::table('role_user')->where('role_id', 5)
        ->join('users','role_user.user_id', '=', 'users.id')->get();


        return view('teacher.list_teacher', compact('list_teacher', 'list_users'));
    }

    public function addTeacher(Request $request){
        $addDocente = DB::table('docentes')->
        insert([
            'nombreDocente' => $request->nombres , 
            'paternoDocente' => $request->apePaterno,
            'maternoDocente' => $request->apeMaterno,
            'correoDocente' => $request->correoPersonal,
            'telDocente' => $request->telefono,
        ]);
        return back()->with('Mensaje', 'Docente agregado con exito');
    }

    public function assignUser(Request $request, $id){
        $assignUser = DB::table('docentes')->where('idDocente', $id)
        ->update(['idUsuario' => $request->user]);

        return back()->with('Mensaje', 'Usuario asignado con exito');
    }
}
