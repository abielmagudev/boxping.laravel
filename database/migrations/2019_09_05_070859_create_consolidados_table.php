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
            $table->string('numero');
            $table->dateTime('notificacion')->nullable();
            $table->unsignedTinyInteger('palets')->nullable();
            $table->unsignedInteger('cliente_id');
            $table->boolean('cliente_alias_numero')->default(0);
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
