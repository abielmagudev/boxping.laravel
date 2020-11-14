<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conductor;
use Faker\Generator as Faker;

$factory->define(Conductor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'created_by' => rand(1,10),
        'updated_by' => rand(1,10),
    ];
});
