<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaIncidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_incidente', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->unsignedBigInteger('salida_id');
            $table->unsignedBigInteger('incidente_id');

            $table->foreign('salida_id')
                ->references('id')->on('salidas')
                ->onDelete('cascade');

            $table->foreign('incidente_id')
                ->references('id')->on('incidentes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida_incidente');
    }
}
