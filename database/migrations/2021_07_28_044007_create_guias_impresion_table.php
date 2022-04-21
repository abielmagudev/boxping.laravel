<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use App\Ahex\GuiaImpresion\Application\InformantsMananger;

class CreateGuiasImpresionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias_impresion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40)->unique();
            $table->text('descripcion')->nullable();
            $table->text('formato_encoded');
            $table->text('margenes_encoded');
            $table->text('tipografia_encoded');
            $table->text('informacion_encoded');
            $table->text('informacion_adicional')->nullable();
            // $table->enum('tipo_descripcion_informacion', InformantsMananger::descriptionTypes())->nullable();
            $table->boolean('activada')->default(1);
            $table->unsignedInteger('intentos_impresion')->default(0);
            $table->timestamps();

            $table->index([
                'activada',
                'intentos_impresion'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guias_impresion');
    }
}
