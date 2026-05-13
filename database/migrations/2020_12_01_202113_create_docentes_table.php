<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('idDocente');
            $table->string('nombreDocente', 50);
            $table->string('paternoDocente', 50);
            $table->string('maternoDocente', 50);
            $table->string('correoDocente', 50);
            $table->string('telDocente', 20);
            $table->unsignedBigInteger('idUsuario')->nullable();
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('docentes');
    }
}
