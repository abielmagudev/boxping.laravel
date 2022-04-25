<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->index();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('etapa_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zonas');
    }
}
