<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinatarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('codigo_postal');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->text('referencias')->nullable();
            $table->string('telefono');
            $table->unsignedSmallInteger('created_by_user');
            $table->unsignedSmallInteger('updated_by_user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinatarios');
    }
}
