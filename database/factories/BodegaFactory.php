<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bodega;
use Faker\Generator as Faker;

$factory->define(Bodega::class, function (Faker $faker) {
    return [
        'nombre' => 'Bodega ' . $faker->unique()->numberBetween(0,5),
        'descripcion' => $faker->text(),
    ];
});
