<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique()->index();
            $table->string('alias')->unique()->index();
            $table->string('contacto');
            $table->string('telefono');
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->text('notas')->nullable();
            $table->unsignedTinyInteger('created_by')->index();
            $table->unsignedTinyInteger('updated_by')->index();
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
        Schema::dropIfExists('clientes');
    }
}
