<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id('idMateria');
            $table->string('nombreMateria', 100);
            $table->string('claveMateria', 50);
            $table->string('creditos', 10);


            $table->unsignedBigInteger('idPrograma')->nullable();
            $table->foreign('idPrograma')->references('idPrograma')->on('programa_educativos')->onDelete('cascade');

            $table->unsignedBigInteger('idModalidad')->nullable();
            $table->foreign('idModalidad')->references('idModalidad')->on('modalidad')->onDelete('cascade');

            $table->unsignedBigInteger('idCuatrimestre')->nullable();
            $table->foreign('idCuatrimestre')->references('idCuatrimestre')->on('cuatrimestres')->onDelete('cascade');
            
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
        Schema::dropIfExists('materias');
    }
}
