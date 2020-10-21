<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $niveles = array_keys( config('system.alertas') );

        Schema::create('alertas', function (Blueprint $table) use ($niveles) {
            $table->bigIncrements('id');
            $table->enum('nivel', $niveles);
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('alertas');
    }
}
