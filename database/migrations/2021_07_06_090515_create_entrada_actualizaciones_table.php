<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaActualizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_actualizaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 128);
            $table->unsignedBigInteger('entrada_id')
                  ->references('id')->on('entradas')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('entrada_actualizaciones');
    }
}
