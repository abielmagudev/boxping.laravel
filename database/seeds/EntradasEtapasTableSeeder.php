<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EntradasEtapasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $entradas = \App\Entrada::all(['id']);
        $peso_options = config('system.measures.peso');
        $dimension_options = config('system.measures.dimension');
        
        foreach($entradas as $entrada)
        {
            $etapa = 0;
            $rand_max = rand(1, 5);
            $rand_etapas = rand(0, $rand_max);

            while ($etapa <= $rand_etapas) {

                $data = [
                    'etapa_id' => $faker->numberBetween(1,10),
                    'peso' => $faker->randomFloat(2, 0.1, 999),
                    'peso_en' => $faker->randomElement( $peso_options ),
                    'ancho' => $faker->randomFloat(2, 0.1, 999),
                    'altura' => $faker->randomFloat(2, 0.1, 999),
                    'largo' => $faker->randomFloat(2, 0.1, 999),
                    'dimensiones_en' => $faker->randomElement( $dimension_options ),
                    'created_by_user' => $faker->numberBetween(1,10),
                    'updated_by_user' => $faker->numberBetween(1,10),
                ];

                $entrada->etapas()->attach($etapa, $data);
                $etapa++;
            }
        }
        // return factory(\App\Etapa::class, 100)->create();
    }
}
