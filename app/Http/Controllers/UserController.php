<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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
    

    public function list_user(){

        $rol_user = DB::table('users')
        ->join('status', 'users.id_status', '=', 'status.id')
        ->leftJoin('role_user', 'users.id', '=','role_user.user_id')
        ->leftJoin('roles', 'role_user.role_id', '=','roles.id')
        ->select('users.id', 'name', 'name_rol', 'status', 'email')
        ->get();
        $list_roles = DB::table('roles')->get();
        $list_status = DB::table('status')->limit(2)->get();
        return view('user.list_user', compact('rol_user', 'list_roles', 'list_status'));
    }
 
    public function update_status( Request $request, $id){

        $update_status = DB::table('users')
        ->join('status', 'users.id_status', '=', 'status.id')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('role_user.user_id', '=', $id)
        ->update(['id_status' => $request->id_status]);

        return back()->with('status_update', 'Status actualizado');
    }
    
    public function update_rol( Request $request, $id){
        
        if($request->roles == 4){
            $busqueda = DB::table('alumnos')
                            ->where('correoInstitucional', '=', $request->email)
                            ->get();
            $resultado = count($busqueda);
            if($resultado > 0){ 
                $update_rol = DB::table('role_user')
                                ->where('user_id', $id)
                                ->update(['role_id' => $request->roles]);
                $userStudent = DB::table('alumnos')
                                ->where('correoInstitucional', $request->email)
                                ->update(['idUsuario' => $id]);
                return back()->with('rol_update', 'Rol actualizado con éxito!');
            }else{
                return back()->with('rol_update', 'El email de este usuario no es apto para este Rol');
            }
        }else{
            $busqueda = DB::table('alumnos')
                        ->where('idUsuario', $id)
                        ->get();
            $resultado = count($busqueda);
            if($resultado > 0){
                $unlink = DB::table('alumnos')
                            ->where('idUsuario', $id)
                            ->update(['idUsuario' => null]);
            }
            $update_rol = DB::table('role_user')
                            ->where('user_id', $id)
                            ->update(['role_id' => $request->roles]);
                            return back()->with('rol_update', 'Rol actualizado con éxito!');
        }
    }
 
    public function deleteUser($id){
        if($id = '19'){
            return back()->with('noDelete', 'Error! Este usuario no puede ser elimiado');
        }else{
            DB::table('users')->delete($id);
            return back()->with('delete', 'El usuario ha sido eliminado');
        }
        
    }

}