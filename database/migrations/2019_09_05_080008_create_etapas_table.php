<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Etapa;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        Schema::create('etapas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique()->index();
            $table->string('slug')->unique()->index();
            $table->unsignedTinyInteger('orden')->default(1);
            $table->string('tareas_encoded', 80)->nullable();
            $table->enum('unica_medicion_peso', Etapa::medicionesPeso(true))->nullable();
            $table->enum('unica_medicion_volumen', Etapa::medicionesVolumen(true))->nullable();
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
