<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Salida;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('rastreo', 20)->unique()->index()->nullable();
            $table->string('confirmacion', 40)->unique()->index()->nullable();
            $table->string('cobertura', 10)->index();
            $table->string('direccion', 80)->nullable()->index();
            $table->string('postal', 10)->nullable()->index();
            $table->string('ciudad', 48)->nullable()->index();
            $table->string('estado', 48)->nullable()->index();
            $table->string('pais', 64)->nullable();
            $table->text('notas')->nullable();
            $table->enum('status', Salida::allStatus())->default(Salida::defaultStatus())->index();
            $table->unsignedTinyInteger('transportadora_id');
            $table->unsignedBigInteger('entrada_id');
            $table->unsignedSmallInteger('created_by');
            $table->unsignedSmallInteger('updated_by');
            $table->timestamps();

            $table->foreign('entrada_id')
                  ->references('id')
                  ->on('entradas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
