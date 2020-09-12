<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsolidadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('cliente_id');
            $table->string('numero', 80);
            $table->unsignedTinyInteger('tarimas')->nullable();
            $table->text('notas')->nullable();
            $table->boolean('abierto')->default(1);
            $table->unsignedSmallInteger('created_by_user');
            $table->unsignedSmallInteger('updated_by_user');
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
        Schema::dropIfExists('consolidados');
    }
}
