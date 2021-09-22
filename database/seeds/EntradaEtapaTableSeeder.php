<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Entrada;
use App\Etapa;

class EntradaEtapaTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $mediciones_peso = array_keys( config('system.mediciones.peso') );
        $mediciones_volumen = array_keys( config('system.mediciones.longitud') );
        $entradas = Entrada::all(['id']);
        $etapas = Etapa::all();
        
        foreach($entradas as $entrada)
        {   
            // Divide la lista etapas apartir de un numero aleatorio
            $etapas_slice_number = rand(1, $etapas->count());
            $etapas_sliced = $etapas->slice( $etapas_slice_number  );

            // Crea un range(array) aleatorio para obtener alertas por IDs
            $range_min = rand(1, 3);
            $range_max = rand(4, 7);
            $alertas_range = range($range_min, $range_max);
            $alertas_id = array_map('strval', $alertas_range);
            
            foreach($etapas_sliced as $e)
            {
                $data = [
                    'peso' => $e->hasTarea('peso') ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medicion_peso' => $faker->randomElement( $mediciones_peso ),
                    'ancho'  => $e->hasTarea('volumen') ? $faker->randomFloat(2, 0.1, 999) : null,
                    'altura' => $e->hasTarea('volumen') ? $faker->randomFloat(2, 0.1, 999) : null,
                    'largo'  => $e->hasTarea('volumen') ? $faker->randomFloat(2, 0.1, 999) : null,
                    'medicion_volumen' => $faker->randomElement( $mediciones_volumen ),
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
