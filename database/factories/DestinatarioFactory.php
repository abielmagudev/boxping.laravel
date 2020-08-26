<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destinatario;
use Faker\Generator as Faker;

$factory->define(Destinatario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'direccion' => $faker->streetAddress,
        'codigo_postal' => $faker->postcode,
        'ciudad' => $faker->city,
        'estado' => $faker->state,
        'pais' => $faker->country,
        'referencias' => $faker->boolean ? $faker->paragraph() : null,
        'telefono' => $faker->phoneNumber,
        'created_by_user' => $faker->numberBetween(1,10),
        'updated_by_user' => $faker->numberBetween(1,10),
    ];
});
