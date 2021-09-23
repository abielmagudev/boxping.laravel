<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Alerta;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $nombres_niveles = Alerta::getNombresNiveles();

        Schema::create('alertas', function (Blueprint $table) use ($nombres_niveles) {
            $table->bigIncrements('id');
            $table->enum('nivel', $nombres_niveles)->index();
            $table->string('nombre')->unique()->index();
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
        Schema::dropIfExists('alertas');
    }
}
