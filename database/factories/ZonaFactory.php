<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Zona;
use Faker\Generator as Faker;

$factory->define(Zona::class, function (Faker $faker) {
    return [
        'nombre' => 'Z' . $faker->unique(true)->numberBetween(100, 9999),
        'descripcion' => $faker->sentence,
        'etapa_id' => $faker->numberBetween(1, 10),
    ];
});
