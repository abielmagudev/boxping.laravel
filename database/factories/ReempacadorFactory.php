<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reempacador;
use Faker\Generator as Faker;

$factory->define(Reempacador::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'clave' => sha1('12345'),
    ];
});
