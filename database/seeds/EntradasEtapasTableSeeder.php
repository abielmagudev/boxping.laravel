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
        $etapas = Etapa::all();

        $peso_en = config('system.measures.peso');
        $volumen_en = config('system.measures.volumen');
        
        foreach($entradas as $entrada)
        {
            if( ! $rand_etapas = rand(0, $etapas->count()) ) 
                continue;
            
            $etapas_sliced = $etapas->slice($rand_etapas);

            foreach($etapas_sliced as $e)
            {
                $data = [
                    'peso' => $e->realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'peso_en' => $faker->randomElement( $peso_en ),
                    'ancho'  => $e->realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'altura' => $e->realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'largo'  => $e->realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'volumen_en' => $faker->randomElement( $volumen_en ),
                    'created_by' => $faker->numberBetween(1,10),
                    'updated_by' => $faker->numberBetween(1,10),
                ];
    
                $entrada->etapas()->attach($e->id, $data);
            }
        }

        // return factory(\App\EntradaEtapa::class, 100)->create();
    }
}
