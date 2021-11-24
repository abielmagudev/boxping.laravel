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
            $table->unsignedBigInteger('entrada_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->timestamp('created_at');

            $table->foreign('entrada_id')
                  ->references('id')
                  ->on('entradas')
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
        Schema::dropIfExists('entrada_actualizaciones');
    }
}
