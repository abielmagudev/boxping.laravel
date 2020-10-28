<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Entrada;
use App\Etapa;

class EntradasEtapasTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $medidas_peso = config('system.medidas.peso');
        $medidas_volumen = config('system.medidas.volumen');
        $entradas = Entrada::all(['id']);
        $etapas = Etapa::all();
        
        foreach($entradas as $entrada)
        {      
            $etapas_sliced = $etapas->slice( rand(1, $etapas->count()) );
            $alertas_integers = range( rand(1, 3), rand(4, 7) );
            $alertas_id = array_map('strval', $alertas_integers);

            foreach($etapas_sliced as $e)
            {
                $data = [
                    'peso' => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medida_peso' => $faker->randomElement( $medidas_peso ),
                    'ancho'  => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'altura' => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'largo'  => $e->realiza_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medida_volumen' => $faker->randomElement( $medidas_volumen ),
                    'zona_id' => $faker->boolean ? $faker->numberBetween(1,5) : null,
                    'alertas_id' => json_encode( $alertas_id ),
                    'created_by' => $faker->numberBetween(1,10),
                    'updated_by' => $faker->numberBetween(1,10),
                ];
    
                $entrada->etapas()->attach($e->id, $data);
            }
        }
    }
}
