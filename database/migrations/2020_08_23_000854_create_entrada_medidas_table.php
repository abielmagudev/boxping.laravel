<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_medidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('entrada_id');
            $table->unsignedInteger('medidor_id');
            $table->decimal('peso',5,2);
            $table->string('pesaje');
            $table->decimal('ancho',5,2)->nullable();
            $table->decimal('altura',5,2)->nullable();
            $table->decimal('profundidad',5,2)->nullable();
            $table->string('volumen');
            $table->unsignedInteger('created_by_user');
            $table->unsignedInteger('updated_by_user');
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
        Schema::dropIfExists('entrada_medidas');
    }
}
