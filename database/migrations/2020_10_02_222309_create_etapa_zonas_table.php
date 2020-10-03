<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapaZonasTable extends Migration
{
    public function up()
    {
        Schema::create('etapa_zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->index();
            $table->timestamps();
            $table->unsignedBigInteger('etapa_id')->index();
            $table->foreign('etapa_id')
                  ->references('id')->on('etapas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('etapa_zonas');
    }
}
