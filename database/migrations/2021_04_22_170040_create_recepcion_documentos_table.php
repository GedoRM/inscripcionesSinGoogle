<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_documentos', function (Blueprint $table) {
            $table->id('idRecepcionDocumentos');
            $table->string('actaOriginal',10)->nullable();
            $table->string('curpOriginal',10)->nullable();
            $table->string('cerigicadoOriginal',10)->nullable();
            $table->string('constanciaOriginal',10)->nullable();
            $table->string('fotoOriginal',10)->nullable();
            $table->string('ineAlumnoOriginal',10)->nullable();
            $table->string('ineTutorOriginal',10)->nullable();
            $table->string('comprobanteDomicilioOriginal',10)->nullable();
            $table->string('observaciones',10)->nullable();

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
        Schema::dropIfExists('recepcion_documentos');
    }
}
