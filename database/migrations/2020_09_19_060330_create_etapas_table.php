<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        $medidas_peso = config('system.measures.peso');
        $medidas_volumen = config('system.measures.volumen');

        Schema::create('etapas', function (Blueprint $table) use ($medidas_peso, $medidas_volumen) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('slug')->unique()->index();
            $table->boolean('realiza_medicion')->default(1);
            $table->enum('medida_peso', $medidas_peso)->nullable();
            $table->enum('medida_volumen', $medidas_volumen)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etapas');
    }
}
