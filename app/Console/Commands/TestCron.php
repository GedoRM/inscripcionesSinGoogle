<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Log;
use Cursos;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hoy = date("Y-m-d");
        
        $cursos = DB::table('cursos')->select('idCurso', 'fecha_inicio', 'fecha_final')->get();
        $arreglo = array();
        foreach($cursos as $item){
            $id = $item->idCurso;
            $fechaFin = $item->fecha_final;
            $fechaInicio = $item->fecha_inicio;
            $id_items = array_push($arreglo, $id);
            /*Por iniciar*/
            if($hoy < $fechaInicio){
                $updateStatus = DB::table('cursos')
                ->where('idCurso', $id)
                ->update(['idEstatus' => 4]);
                /*Activo*/
            }else if($hoy > $fechaInicio && $fechaFin > $hoy){
                $updateStatus = DB::table('cursos')
                ->where('idCurso', $id)
                ->update(['idEstatus' => 2]);
                /** Finalizado */
            }else if($hoy > $fechaFin){
                $updateStatus = DB::table('cursos')
                ->where('idCurso', $id)
                ->update(['idEstatus' => 3]);
            }
        }
        $resultado = DB::table('cursos')->where('id', $id_items);
        dd($id_items);
        
        

    }

}