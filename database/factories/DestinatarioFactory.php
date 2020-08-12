<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destinatario;
use Faker\Generator as Faker;

$factory->define(Destinatario::class, function (Faker $faker) {

    $verificado = $faker->boolean;

    return [
        'entrada_id' => $faker->numberBetween(1,100),
        'nombre' => $faker->name(),
        'direccion' => $faker->streetAddress,
        'codigo_postal' => $faker->postcode,
        'ciudad' => $faker->city,
        'estado' => $faker->state,
        'pais' => $faker->country,
        'referencias' => $faker->boolean ? $faker->paragraph() : null,
        'telefono' => $faker->phoneNumber,
        'verificado_at' => $verificado ? $faker->dateTime() : null,
        'verificado_by_user' => $verificado ? $faker->numberBetween(1,10) : null,
        'created_by_user' => $faker->numberBetween(1,10),
        'updated_by_user' => $faker->numberBetween(1,10),
    ];
});
