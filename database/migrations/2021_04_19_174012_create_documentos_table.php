<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('idDocumento');
            $table->string('actaNacimiento', 255);
            $table->string('constanciaEstudios', 255);
            $table->string('curp', 255);
            $table->string('ine', 255);
            $table->string('ineTutor', 255);
            $table->string('comprobanteDomicilio', 255);
            $table->string('foto', 255);
            $table->string('comprobantePago', 255);

            $table->unsignedBigInteger('idAlumno')->nullable();
            $table->foreign('idAlumno')->references('idAlumno')->on('alumnos')->onDelete('cascade');
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
        Schema::dropIfExists('documentos');
    }
}
