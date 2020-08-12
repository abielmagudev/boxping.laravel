<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'alias' => substr($faker->company, 0, 2),
        'contacto' => $faker->name(),
        'telefono' => $faker->phoneNumber,
        'correo_electronico' => $faker->safeEmail,
        'direccion' => $faker->streetAddress,
        'ciudad' => $faker->city,
        'estado' => $faker->state,
        'pais' => $faker->country,
    ];
});
