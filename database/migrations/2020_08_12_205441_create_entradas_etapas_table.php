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
            $table->unsignedBigInteger('entrada_id')->index();
            $table->unsignedInteger('etapa_id')->index();
            $table->decimal('peso',6,2)->nullable();
            $table->string('medida_peso')->nullable();
            $table->decimal('ancho',6,2)->nullable();
            $table->decimal('altura',6,2)->nullable();
            $table->decimal('largo',6,2)->nullable();
            $table->string('medida_volumen')->nullable();
            $table->unsignedInteger('zona_id')->nullable()->index();
            $table->string('alertas_id')->nullable()->index();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
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