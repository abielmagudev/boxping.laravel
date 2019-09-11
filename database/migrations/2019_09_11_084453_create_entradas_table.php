<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->boolean('alias_cliente_numero');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('consolidado_id')->nullable();
            $table->unsignedInteger('vuelta')->nullable();
            $table->dateTime('recibido_at')->nullable();

            // Cruce
            $table->unsignedInteger('conductor_id')->nullable();
            $table->unsignedInteger('vehiculo_id')->nullable();
            $table->dateTime('cruce_at')->nullable();

            // Reempacado
            $table->unsignedInteger('reempacador_id')->nullable();
            $table->unsignedInteger('codigor_id')->nullable();
            $table->dateTime('reempacado_at')->nullable();

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
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
        Schema::dropIfExists('entradas');
    }
}
