<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Observacion;
use Faker\Generator as Faker;

$factory->define(Observacion::class, function (Faker $faker) {
    return [
        'entrada_id' => $faker->numberBetween(1,75),
        'contenido' => $faker->text(),
        'created_by_user' => $faker->numberBetween(1,10),
    ];
});
