<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medidor;
use Faker\Generator as Faker;

$factory->define(Medidor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique(true)->randomElement(['Inicial','Nacional','Internacional','Bodega','Patio']),
        'descripcion' => $faker->sentence(),
    ];
});
