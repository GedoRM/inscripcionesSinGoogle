<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormularioController extends Controller
{
    public function newStudent(Request $request){
        $newStudent = DB::table('alumnos')->insert([
            'apePaterno' => $request->apepat, 
            'apeMaterno' => $request->apemat, 
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'fechaNacimiento' => $request->fecha, 
            'curp' => $request->curp, 
            'sexo' => $request->sexo, 
            'calle' => $request->calle, 
            'numCalle' => $request->numero, 
            'colonia' => $request->colonia, 
            'telFijo' => $request->telfijo, 
            'telCelular' => $request->telcelular, 
            'correoAlumno' => $request->correo, 
            'escEgreso' => $request->esceg, 
            'generacion' => $request->generacion, 
            'promedioEgreso' => $request->promedioegreso,
            'nombreTutor' => $request->nombtutor, 
            'parentescoTutor' => $request->parentesco, 
            'domicilioTutor' => $request->directutor, 
            'telTutor' => $request->teltutor, 
            //'termyCond' => , 
            //'cartaCompromiso' => $request->,
            'idMunicipio' => $request->municipio, 
            'idPeriodo' => $request->periodo, 
            'idPrograma' => $request->programa, 
            'idModalidad' => $request->modalidad, 
            'idEstatus' => 3,
            'idTipoBeca' => 1, 
            'idPromedio' => 1, 
            'idDependencia' => 1, 
            'idPorcentaje' => 1, 
            //'idAsesores' => $request->, 
            //'idUsuario' => $request->,  
            'created_at' => now(),
            'fechaRegistro' => date('Y-m-d')
            ]);

            $ultimoId = DB::table('alumnos')->latest('idAlumno')->first();
            $nombre = $ultimoId->nombre;
            $apePat = $ultimoId->apePaterno;
            $apeMat = $ultimoId->apeMaterno;
            $carpeta = public_path().'documentos/'.$request->curp;

            if(!file_exists($carpeta)){
                mkdir($carpeta, 0777,true);
            }
            $newCarpeta = DB::table('documentos')->insert([
                'idAlumno' => $ultimoId->idAlumno
            ]);

            return back()->with('mensaje', 'Hemos recibido tu solicitud de inscripción.
                                            En breve uno de nuestros asesores educativos te contactará 
                                            para continuar con el proceso');

    }
}