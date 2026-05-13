<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('idPago');
            
            $table->unsignedBigInteger('idAlumno')->nullable();
            $table->foreign('idAlumno')->references('idAlumno')->on('alumnos')->onDelete('cascade');

            $table->unsignedBigInteger('idConcepto')->nullable();
            $table->foreign('idConcepto')->references('idConcepto')->on('conceptos')->onDelete('cascade');

            $table->unsignedBigInteger('idEstatus')->nullable();
            $table->foreign('idEstatus')->references('idEstatusPago')->on('estatus_pagos')->onDelete('cascade');

            $table->decimal('cantidad', 10,2);
            $table->date('fechaCaptura');
            $table->string('descripcion', 50);

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
