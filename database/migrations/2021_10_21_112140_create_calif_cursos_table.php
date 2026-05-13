<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalifCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calif_cursos', function (Blueprint $table) {
            $table->id('idCalifCurso');
            

            $table->unsignedBigInteger('FK_ID_PREGUNTA')->nullable();
            $table->foreign('FK_ID_PREGUNTA')->references('idPregunta')->on('banco_preguntas')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('FK_ID_ALUCURSO')->nullable();
            $table->foreign('FK_ID_ALUCURSO')->references('idUserCourse')->on('alumno_cursos')->onDelete('cascade')->onUpdate('cascade');

            $table->string('respuesta');
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
        Schema::dropIfExists('calif_cursos');
    }
}
