<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdministrativeController extends Controller
{
    public function pagos($id){
        $user = DB::table('alumnos')->where('idAlumno', $id)->get();
        $conceptos = DB::table('conceptos')->get();
        $estatusPago = DB::table('estatus_pagos')->get();

        $pagos = DB::table('pagos')
                        ->join('alumnos', 'pagos.idAlumno', 'alumnos.idAlumno')
                        ->join('conceptos', 'pagos.idConcepto', 'conceptos.idConcepto')
                        ->join('estatus_pagos', 'pagos.idEstatus', 'estatus_pagos.idEstatusPago')
                        ->where('pagos.idAlumno', $id)
                        ->orderBy('idPago', 'desc')
                        ->get();
        return view('profiles.academy.students.verPagos', compact('user', 'conceptos', 'estatusPago', 'pagos'));
    }

    public function addPago(Request $request, $id){

        $insert = DB::table('pagos')
        ->insert([
            'idAlumno' => $id,
            'idConcepto' => $request->concepto,
            'idEstatus' => $request->estatus,
            'cantidad' => $request->cantidad,
            'fechaCaptura' => date('Y-m-d'),
            'descripcion' => ucwords($request->descripcion)
        ]);
        

        return back()->with('mensaje', 'Registro guardado con éxito');
    }

    public function actualizarPago(Request $request, $idPago){
        
        $update = DB::table('pagos')
        ->where('idPago', $idPago)
        ->update([
            'idConcepto' => $request->concepto,
            'idEstatus' => $request->estatus,
            'cantidad' => $request->cantidad,
            'descripcion' => ucwords($request->descripcion)
        ]);
        return back()->with('pagoActualizado', 'El registro ha sido actualizado');
    }

    public function viewStudents(){
        $student = DB::table('alumnos')
                    ->join('programa_educativos', 'alumnos.idPrograma', '=', 'programa_educativos.idPrograma')
                    ->join('estatus_alumno', 'alumnos.idEstatus', 'estatus_alumno.idEstatusAlumno')
                    ->where('correoInstitucional' ,'!=', null, 'AND', 'correoInstitucional', '!=', " ")
                    ->get();
        return view('profiles.academy.students.viewStudents', compact('student'));
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
        return view('profiles.academy.students.viewInfo', 
                compact('students', 'municipios', 'type_beca', 'promedios', 'porcentajes', 
                'dependencias', 'programas', 'periodos', 'modalidades'));
    }

    public function viewDocuments($idAlumno){
        $student = DB::table('alumnos')
        ->where('alumnos.idAlumno', $idAlumno)
        ->join('documentos', 'alumnos.idAlumno', 'documentos.idAlumno')
        ->get();
        return view('profiles.academy.students.viewDocuments', compact('student'));
    }

    public function buscar(Request $request){
        $curso = DB::table('alumnos')->where('nombre','like',$request->buscar.'%')->get();
        return view('course.actions.enrolleStudent', compact("curso"));
    }
}
