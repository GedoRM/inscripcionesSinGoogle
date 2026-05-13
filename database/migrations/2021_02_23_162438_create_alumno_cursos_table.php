<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_cursos', function (Blueprint $table) {
            $table->id('idUserCourse');

            $table->unsignedBigInteger('idAlumno')->nullable();
            $table->unsignedBigInteger('idCurso')->nullable();
            $table->string('unidad', 20)->nullable();
            $table->string('calificacion',20)->nullable();
            $table->foreign('idAlumno')->references('idAlumno')->on('alumnos')->onDelete('cascade');
            $table->foreign('idCurso')->references('idCurso')->on('cursos')->onDelete('cascade');
            
            
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
        Schema::dropIfExists('alumno_cursos');
    }
}
