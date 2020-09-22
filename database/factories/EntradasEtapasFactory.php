<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {

    $realizar_medicion = $faker->boolean;

    return [
        'entrada_id' => $faker->numberBetween(1,100),
        'etapa_id' => $faker->numberBetween(1,10),
        'peso' => $realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : '0.00',
        'peso_en' => $realizar_medicion ? $faker->randomElement( config('system.measures.peso') ) : null,
        'ancho' => $realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
        'altura' => $realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
        'largo' => $realizar_medicion ? $faker->randomFloat(2, 0.1, 999) : null,
        'dimensiones_en' => $realizar_medicion ? $faker->randomElement( config('system.measures.dimension') ) : null,
        'created_by_user' => $faker->numberBetween(1,10),
        'updated_by_user' => $faker->numberBetween(1,10),
    ];
});
