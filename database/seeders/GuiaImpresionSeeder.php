<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\GuiaImpresion;

class GuiaImpresionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return GuiaImpresion::create([
            'nombre' => 'Información completa',
            'formato_json' => json_encode([]),
            'margenes_json' => json_encode([]),
            'tipografia_json' => json_encode([]),
            'contenido_json' => json_encode([]),
        ]);
    }
}
