<?php

namespace App\Http\Controllers;
use App;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriesController extends Controller
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

    public function list_materies(){
        $list_materias = DB::table('materias')
        ->join('programa_educativos', 'materias.idPrograma', '=', 'programa_educativos.idPrograma')
        ->join('modalidad', 'materias.idModalidad', '=', 'modalidad.idModalidad')
        ->join('cuatrimestres', 'materias.idCuatrimestre', '=', 'cuatrimestres.idCuatrimestre')
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

        $list_lic = DB::table('programa_educativos')->get();
        $list_sistema = DB::table('modalidad')->get();
        $list_cuatri = DB::table('cuatrimestres')->get();
        return view('materies.list_materies', compact('list_materias', 'list_lic', 'list_sistema', 'list_cuatri', 'count', 'notificacionesPass' ));
    }

    public function addMateries(Request $request){
        $newMaterie = DB::table('materias')
        ->insert([
            'nombreMateria' => $request->nombreMateria,
            'claveMateria' => $request->claveMateria,
            'creditos' => $request->creditosMateria,
            'idPrograma' => $request->licenciatura,
            'idModalidad' => $request->modalidad,
            'idCuatrimestre' => $request->cuatrimestre
            ]);

        return back()->with('mensaje', 'Materia agregada');

    }
 
    public function updateMaterie(Request $request, $id){
        $materia = DB::table('materias')
        ->where('idMateria', $id)
        ->update([
            'nombreMateria' => $request->nombreMateria ,
            'claveMateria' => $request->claveMateria ,
            'creditos' => $request->creditosMateria,
            'idPrograma' => $request->programa ,
            'idModalidad' => $request->modalidad , 
            'idCuatrimestre' => $request->cuatrimestre
            ]);
        
        return back()->with('mensaje', 'Materia actualizada');
    }
}
