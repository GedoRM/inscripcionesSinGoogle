<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('idCurso');
            $table->string('fecha_inicio', 100);
            $table->string('fecha_final', 100);
           // $table->unsignedBigInteger('idPrograma')->nullable();
           // $table->foreign('idPrograma')->references('idPrograma')->on('programa_educativos')->onDelete('cascade');

            //$table->unsignedBigInteger('idModalidad')->nullable();
            //$table->foreign('idModalidad')->references('idModalidad')->on('modalidad')->onDelete('cascade');

            //$table->unsignedBigInteger('idPeriodo')->nullable();
            //$table->foreign('idPeriodo')->references('idPeriodo')->on('periodos')->onDelete('cascade');

            $table->unsignedBigInteger('idMateria')->nullable();
            $table->foreign('idMateria')->references('idMateria')->on('materias')->onDelete('cascade');

            $table->unsignedBigInteger('idAlumno')->nullable();
            $table->foreign('idAlumno')->references('idAlumno')->on('alumnos')->onDelete('cascade');

            $table->unsignedBigInteger('idDocente')->nullable();
            $table->foreign('idDocente')->references('idDocente')->on('docentes')->onDelete('cascade');

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
        Schema::dropIfExists('cursos');
    }
}
