<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etapa;
use Faker\Generator as Faker;

$factory->define(Etapa::class, function (Faker $faker) {
    return [
        'nombre' => 'Etapa ' . $faker->unique(true)->randomNumber(),
        'descripcion' => $faker->sentence(),
        'realizar_medicion' => $faker->boolean ? 1 : 0,
        'created_by_user' => $faker->randomDigitNotNull,
        'updated_by_user' => $faker->randomDigitNotNull,
    ];
});
