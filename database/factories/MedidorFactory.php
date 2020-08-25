<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medidor;
use Faker\Generator as Faker;

$factory->define(Medidor::class, function (Faker $faker) {
    return [
        'nombre' => 'Medidor ' . $faker->unique()->randomNumber(),
        'descripcion' => $faker->sentence(),
    ];
});
