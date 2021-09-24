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
        $all_status_names = Salida::getAllStatusNombres();

        Schema::create('salidas', function (Blueprint $table) use ($all_status_names) {
            $table->bigIncrements('id');
            $table->string('rastreo', 20)->unique()->index()->nullable();
            $table->string('confirmacion', 40)->unique()->index()->nullable();
            $table->string('cobertura', 10)->index();
            $table->string('direccion', 80)->index()->nullable();
            $table->string('postal', 10)->index()->nullable();
            $table->string('ciudad', 48)->index()->nullable();
            $table->string('estado', 48)->index()->nullable();
            $table->string('pais', 64)->nullable();
            $table->text('notas')->nullable();
            $table->enum('status', $all_status_names)->index()->default($all_status_names[0]);
            $table->unsignedTinyInteger('transportadora_id');
            $table->unsignedBigInteger('entrada_id');
            $table->unsignedSmallInteger('created_by');
            $table->unsignedSmallInteger('updated_by');
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
        Schema::dropIfExists('salidas');
    }
}
