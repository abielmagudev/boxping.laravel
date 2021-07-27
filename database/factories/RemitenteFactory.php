<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Remitente;
use Faker\Generator as Faker;

$factory->define(Remitente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'direccion' => $faker->streetAddress,
        'postal' => $faker->postcode,
        'ciudad' => $faker->city,
        'estado' => $faker->state,
        'pais' => $faker->country,
        'telefono' => $faker->phoneNumber,
        'created_by' => $faker->numberBetween(1,10),
        'updated_by' => $faker->numberBetween(1,10),
    ];
});
