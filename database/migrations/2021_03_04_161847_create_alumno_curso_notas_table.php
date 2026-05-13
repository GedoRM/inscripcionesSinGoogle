<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoCursoNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_curso_notas', function (Blueprint $table) {
            $table->id('idAlumnoCursoNota');
            $table->string('nota', 50)->nullable();
            $table->unsignedBigInteger('idAlumnoCurso')->nullable();
            $table->foreign('idAlumnoCurso')->references('idUserCourse')->on('alumno_cursos')->onDelete('cascade');

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
        Schema::dropIfExists('alumno_curso_notas');
    }
}
