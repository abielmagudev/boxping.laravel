<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        $peso_en = config('system.measures.peso');
        $volumen_en = config('system.measures.volumen');

        Schema::create('etapas', function (Blueprint $table) use ($peso_en, $volumen_en) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->boolean('realizar_medicion')->default(1);
            $table->enum('peso_en', $peso_en)->nullable();
            $table->enum('volumen_en', $volumen_en)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
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
        Schema::dropIfExists('etapas');
    }
}
