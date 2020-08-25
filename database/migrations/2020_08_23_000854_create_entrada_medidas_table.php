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
        
        // Schema::table('entrada_medidas', function ($table) {
        //     $table->unsignedBigInteger('entrada_id')->index(); // Must be like id of entradas
        //     $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade');
        //     $table->foreign('entrada_id')->references('id')->on('entradas')->onDelete('cascade');
        // });
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
