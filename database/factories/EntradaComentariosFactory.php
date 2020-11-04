<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'contenido'  => $faker->text(),
        'entrada_id' => $faker->numberBetween(1,75),
        'created_by' => $faker->numberBetween(1,10),
    ];
});
