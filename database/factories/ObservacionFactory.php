<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Observacion;
use Faker\Generator as Faker;

$factory->define(Observacion::class, function (Faker $faker) {
    return [
        'contenido' => $faker->text(),
        'user_id' => $faker->numberBetween(1,15),
        'entrada_id' => $faker->numberBetween(1,20),
    ];
});
