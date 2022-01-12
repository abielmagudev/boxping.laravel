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
            'nombre' => 'GuiaImpresionSeeded',
            'descripcion' => 'GuiaImpresion generada por un seeder.',
            'formato_encoded' => json_encode([]),
            'margenes_encoded' => json_encode([]),
            'tipografia_encoded' => json_encode([]),
            'informacion_encoded' => json_encode([]),
        ]);
    }
}
