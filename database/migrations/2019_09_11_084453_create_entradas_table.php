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
            
            // Entrada
            $table->bigIncrements('id');
            $table->string('numero');
            $table->unsignedInteger('consolidado_id')->nullable();
            $table->unsignedInteger('cliente_id');
            $table->boolean('cliente_alias_numero');

            // Trayectoria
            $table->unsignedInteger('destinatario_id')->nullable();
            $table->unsignedInteger('remitente_id')->nullable();
            
            // Registro
            $table->datetime('recibido_at')->nullable();
            $table->unsignedSmallInteger('recibido_by_user')->nullable();

            // Cruce
            $table->unsignedInteger('vehiculo_id')->nullable();
            $table->unsignedInteger('conductor_id')->nullable();
            $table->unsignedInteger('vuelta')->nullable();
            $table->date('cruce_fecha')->nullable();
            $table->time('cruce_hora')->nullable();

            // Reempacado
            $table->unsignedInteger('codigor_id')->nullable();
            $table->unsignedInteger('reempacador_id')->nullable();
            $table->date('reempacado_fecha')->nullable();
            $table->time('reempacado_hora')->nullable();

            // Verificacion
            $table->datetime('verificado_at')->nullable();
            $table->unsignedSmallInteger('verificado_by_user')->nullable();

            // Log
            $table->unsignedInteger('created_by_user');
            $table->unsignedInteger('updated_by_user');
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
