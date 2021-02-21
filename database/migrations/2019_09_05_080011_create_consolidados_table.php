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
        $config_consolidados = config('system.consolidados');
        $all_status = array_keys($config_consolidados['status']);
        
        Schema::create('consolidados', function (Blueprint $table) use ($all_status) {
            $table->bigIncrements('id');
            $table->string('numero', 80)->unique()->index();
            $table->unsignedTinyInteger('tarimas')->nullable();
            $table->enum('status', $all_status);
            $table->text('notas')->nullable();
            $table->unsignedSmallInteger('cliente_id');
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
        Schema::dropIfExists('consolidados');
    }
}
