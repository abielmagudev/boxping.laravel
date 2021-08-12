<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportadoraGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportadora_guias', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('transportadora_id');
            $table->string('nombre', 32);
            $table->text('formato');
            $table->text('margenes');
            $table->text('tipografia');
            $table->text('contenido');
            $table->unsignedInteger('impresiones')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportadora_guias');
    }
}
