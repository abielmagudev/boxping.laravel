<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consolidado;
use Faker\Generator as Faker;

$factory->define(Consolidado::class, function (Faker $faker) {
    return [
        'numero' => $faker->unique(true)->randomNumber . time(),
        'tarimas' => $faker->numberBetween(1,5),
        'abierto' => $faker->boolean ? 1 : 0,
        'notas' => $faker->boolean ? $faker->sentence() : null,
        'cliente_id' => $faker->numberBetween(1,10),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
