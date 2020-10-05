<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('contenido');
            $table->unsignedInteger('created_by');
            $table->timestamps();
            $table->unsignedBigInteger('entrada_id');
            $table->foreign('entrada_id')
                  ->references('id')->on('entradas')
                  ->onDelete('cascade');
        });

        // Schema::enableForeignKeyConstraints();
        // Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_comentarios');
    }
}
