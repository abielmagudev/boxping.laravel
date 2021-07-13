<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaEtapaAlertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_etapa_alerta', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->unsignedInteger('entrada_etapa_id')->index();
            $table->unsignedInteger('alerta_id')->index();
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
        Schema::dropIfExists('entrada_etapa_alerta');
    }
}
