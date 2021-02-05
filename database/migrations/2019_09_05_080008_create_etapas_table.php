<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        $medidas_peso = config('system.medidas.peso');
        $medidas_volumen = config('system.medidas.volumen');

        Schema::create('etapas', function (Blueprint $table) use ($medidas_peso, $medidas_volumen) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique()->index();
            $table->string('slug')->unique()->index();
            $table->unsignedTinyInteger('orden')->default(1);
            $table->boolean('realiza_medicion')->default(1);
            $table->enum('unica_medida_peso', $medidas_peso)->nullable();
            $table->enum('unica_medida_volumen', $medidas_volumen)->nullable();
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
