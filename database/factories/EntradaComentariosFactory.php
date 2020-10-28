<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'entrada_id' => $faker->numberBetween(1,75),
        'contenido'  => $faker->text(),
        'created_by' => $faker->numberBetween(1,10),
    ];
});