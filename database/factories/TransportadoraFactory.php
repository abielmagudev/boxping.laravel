<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transportadora;
use Faker\Generator as Faker;

$factory->define(Transportadora::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'web' => $faker->domainName,
        'telefono' => $faker->phoneNumber,
        'notas' => $faker->text(),
    ];
});
