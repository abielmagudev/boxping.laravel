<?php

use Illuminate\Database\Seeder;

class GuiasImpresionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // return factory(App\GuiaImpresion::class, 1)->create();

        return App\GuiaImpresion::create([
            'nombre' => 'Información completa',
            'formato_json' => json_encode([]),
            'margenes_json' => json_encode([]),
            'tipografia_json' => json_encode([]),
            'contenido_json' => json_encode([]),
        ]);
    }
}
