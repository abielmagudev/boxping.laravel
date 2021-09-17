<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        $mediciones_peso = array_keys(config('system.mediciones.peso'));
        $mediciones_volumen = array_keys(config('system.mediciones.longitud'));

        Schema::create('etapas', function (Blueprint $table) use ($mediciones_peso, $mediciones_volumen) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique()->index();
            $table->string('slug')->unique()->index();
            $table->unsignedTinyInteger('orden')->default(1);
            $table->unsignedTinyInteger('mediciones')->default(0);
            $table->enum('medicion_peso', $mediciones_peso)->nullable();
            $table->enum('medicion_volumen', $mediciones_volumen)->nullable();
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
