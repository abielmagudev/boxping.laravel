<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consolidado;
use Faker\Generator as Faker;

$factory->define(Consolidado::class, function (Faker $faker) {
    return [
        'numero' => $faker->randomNumber(),
        'cliente_id' => $faker->numberBetween(1,10),
    ];
});
