<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Entrada;
use App\Etapa;

class EntradasEtapasTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $entradas = Entrada::all(['id']);
        $etapas = Etapa::all(['id']);

        $peso_en_options = config('system.measures.peso');
        $dimensiones_en_options = config('system.measures.dimension');
        
        foreach($entradas as $entrada)
        {
            if( ! $etapas_rand = rand(0, $etapas->count()) )
                continue;
            
            $etapa_id = 0;

            while ($etapa_id <= $etapas_rand) {

                $data = [
                    'etapa_id' => $faker->numberBetween(1,10),
                    'peso' => $faker->randomFloat(2, 0.1, 999),
                    'peso_en' => $faker->randomElement( $peso_en_options ),
                    'ancho' => $faker->randomFloat(2, 0.1, 999),
                    'altura' => $faker->randomFloat(2, 0.1, 999),
                    'largo' => $faker->randomFloat(2, 0.1, 999),
                    'dimensiones_en' => $faker->randomElement( $dimensiones_en_options ),
                    'created_by' => $faker->numberBetween(1,10),
                    'updated_by' => $faker->numberBetween(1,10),
                ];

                $entrada->etapas()->attach($etapa_id, $data);
                $etapa_id++;
            }
        }

        // return factory(\App\EntradaEtapa::class, 100)->create();
    }
}
