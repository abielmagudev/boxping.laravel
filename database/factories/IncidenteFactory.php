<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Incidente;
use Faker\Generator as Faker;

$factory->define(Incidente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique(true)->colorName . ' ' . rand(1,60),
        'descripcion' => $faker->boolean ? $faker->sentence : null,
        'created_by' => rand(1,10),
        'updated_by' => rand(1,10),
    ];
});
