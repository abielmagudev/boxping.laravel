<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasEtapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_etapas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entrada_id');
            $table->unsignedBigInteger('etapa_id');
            $table->decimal('peso',5,2)->nullable();
            $table->string('peso_en')->nullable();
            $table->decimal('ancho',5,2)->nullable();
            $table->decimal('altura',5,2)->nullable();
            $table->decimal('largo',5,2)->nullable();
            $table->string('dimensiones_en')->nullable();
            $table->unsignedInteger('created_by_user');
            $table->unsignedInteger('updated_by_user');
            $table->timestamps();
            $table->foreign('entrada_id')
                  ->references('id')->on('entradas')
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
        Schema::dropIfExists('entrada_etapas');
    }
}


// $table->unsignedBigInteger('entrada_id')->index(); // Must be like id of entradas
// $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade');
// $table->foreign('entrada_id')->references('id')->on('entradas')->onDelete('cascade');
