<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasImpresionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias_impresion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 32)->unique();
            $table->text('formato_encoded');
            $table->text('margenes_encoded');
            $table->text('tipografia_encoded');
            $table->text('contenido_encoded');
            $table->text('notas')->nullable();
            $table->unsignedInteger('intentos')->default(0);
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
        Schema::dropIfExists('guias_impresion');
    }
}
