<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifpassUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifpass_user', function (Blueprint $table) {
            $table->id('idNotifpss_user');
            
            $table->unsignedBigInteger('FK_ID_USER')->nullable();
            $table->foreign('FK_ID_USER')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('FK_ID_NOTIFICACION')->nullable();
            $table->foreign('FK_ID_NOTIFICACION')->references('idNotifPass')->on('notification_passes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('notifpass_user');
    }
}
