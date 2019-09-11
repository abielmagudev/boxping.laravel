<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Codigor;
use Faker\Generator as Faker;

$factory->define(Codigor::class, function (Faker $faker) {
    return [
        'nombre' => 'R' . $faker->unique()->numberBetween(1,15),
        'descripcion' => $faker->text(100),
    ];
});
