<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consolidado;
use Faker\Generator as Faker;

$factory->define(Consolidado::class, function (Faker $faker) {
    return [
        'cliente_id' => $faker->numberBetween(1,10),
        'numero' => $faker->randomNumber(),
        'tarimas' => $faker->numberBetween(1,5),
        'notas' => $faker->boolean ? $faker->sentence() : null,
    ];
});
