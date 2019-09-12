<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicion;
use Faker\Generator as Faker;

$factory->define(Medicion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->randomElement(['Inicial','Extranjero','Nacional']),
    ];
});
