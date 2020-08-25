<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medida;
use Faker\Generator as Faker;

$factory->define(Medida::class, function (Faker $faker) {
    return [
        'entrada_id' => $faker->numberBetween(1,100),
        'medidor_id' => $faker->numberBetween(1,3),
        'peso' => $faker->randomFloat(2, 0.1, 999),
        'pesaje' => $faker->randomElement( config('system.measures.pesajes') ),
        'ancho' => $faker->randomFloat(2, 0.1, 999),
        'altura' => $faker->randomFloat(2, 0.1, 999),
        'profundidad' => $faker->randomFloat(2, 0.1, 999),
        'volumen' => $faker->randomElement( config('system.measures.volumenes') ),
        'created_by_user' => $faker->numberBetween(1,10),
        'updated_by_user' => $faker->numberBetween(1,10),
    ];
});
