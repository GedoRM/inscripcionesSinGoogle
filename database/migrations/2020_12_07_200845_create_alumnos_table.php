<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('idAlumno');
            $table->string('apePaterno', 50);
            $table->string('apeMaterno', 50);
            $table->string('nombre',100);
            $table->string('edad',10);
            $table->string('fechaNacimiento', 20);
            $table->string('curp', 20)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->string('calle', 50);
            $table->string('numCalle', 10)->nullable();
            $table->string('colonia', 50);
            $table->string('telFijo', 15)->nullable();
            $table->string('telCelular', 15)->nullable();
            $table->string('correoAlumno', 50);
            $table->string('escEgreso', 50); 
            $table->string('generacion', 20);
            $table->string('promedioEgreso', 50)->nullable();
            $table->string('nombreTutor', 150)->nullable();
            $table->string('parentescoTutor', 50)->nullable();
            $table->string('domicilioTutor', 500)->nullable();
            $table->string('telTutor', 15)->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('termyCond')->nullable();
            $table->string('cartaCompromiso')->nullable();
            $table->string('fechaRegistro')->nullable();
            $table->string('correoInstitucional')->nullable();

            $table->unsignedBigInteger('idEstatus')->nullable();
            $table->foreign('idEstatus')->references('idEstatusAlumno')->on('estatus_alumno')->onDelete('cascade');

            $table->unsignedBigInteger('idMunicipio')->nullable();
            $table->foreign('idMunicipio')->references('idMunicipio')->on('municipios')->onDelete('cascade');

            $table->unsignedBigInteger('idPeriodo')->nullable();
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos')->onDelete('cascade');

            $table->unsignedBigInteger('idPrograma')->nullable();
            $table->foreign('idPrograma')->references('idPrograma')->on('programa_educativos')->onDelete('cascade');

            $table->unsignedBigInteger('idModalidad')->nullable();
            $table->foreign('idModalidad')->references('idModalidad')->on('modalidad')->onDelete('cascade');

            $table->unsignedBigInteger('idTipoBeca')->nullable();
            $table->foreign('idTipoBeca')->references('idTipoBeca')->on('tipo_becas')->onDelete('cascade');

            $table->unsignedBigInteger('idPromedio')->nullable();
            $table->foreign('idPromedio')->references('idPromedio')->on('promedios')->onDelete('cascade');

            $table->unsignedBigInteger('idDependencia')->nullable();
            $table->foreign('idDependencia')->references('idDependencia')->on('dependencias')->onDelete('cascade');

            $table->unsignedBigInteger('idPorcentaje')->nullable();
            $table->foreign('idPorcentaje')->references('idPorcentaje')->on('porcentajes')->onDelete('cascade');

            $table->unsignedBigInteger('idAsesores')->nullable();
            $table->foreign('idAsesores')->references('idAsesor')->on('asesores')->onDelete('cascade');

            $table->unsignedBigInteger('idUsuario')->nullable();
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('FK_ID_CUATRIMESTRE')->nullable();
            $table->foreign('FK_ID_CUATRIMESTRE')->references('idCuatrimestre')->on('cuatrimestres')->onDelete('cascade');

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
        Schema::dropIfExists('alumnos');
    }
}
