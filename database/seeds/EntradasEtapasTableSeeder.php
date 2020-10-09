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

        $medidas_peso = config('system.measures.peso');
        $medidas_volumen = config('system.measures.volumen');
        
        foreach($entradas as $entrada)
        {
            if( ! $rand_etapas = rand(0, $etapas->count()) ) 
                continue;
            
            $etapas_sliced = $etapas->slice($rand_etapas);

            foreach($etapas_sliced as $e)
            {
                $data = [
                    'peso' => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medida_peso' => $faker->randomElement( $medidas_peso ),
                    'ancho'  => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'altura' => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'largo'  => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medida_volumen' => $faker->randomElement( $medidas_volumen ),
                    'created_by' => $faker->numberBetween(1,10),
                    'updated_by' => $faker->numberBetween(1,10),
                    'zona_id' => $faker->boolean ? $faker->numberBetween(1,5) : null,
                ];
    
                $entrada->etapas()->attach($e->id, $data);
            }
        }

        // return factory(\App\EntradaEtapa::class, 100)->create();
    }
}
