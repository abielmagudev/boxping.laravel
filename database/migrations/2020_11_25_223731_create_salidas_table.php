<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config_status = config('system.salidas.status');
        $status_values = array_keys($config_status);
        $status_default = $status_values[0];

        Schema::create('salidas', function (Blueprint $table) use ($status_values, $status_default) {
            $table->bigIncrements('id');
            $table->string('rastreo', 20)->unique()->index()->nullable();
            $table->string('confirmacion', 40)->unique()->index()->nullable();
            $table->string('cobertura', 10)->index();
            $table->string('direccion', 80)->index()->nullable();
            $table->string('postal', 10)->index()->nullable();
            $table->string('ciudad', 48)->index()->nullable();
            $table->string('estado', 24)->index()->nullable();
            $table->string('pais', 32)->nullable();
            $table->text('notas')->nullable();
            $table->enum('status', $status_values)->index()->default($status_default);
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
