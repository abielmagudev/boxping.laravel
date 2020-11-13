<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transportadora;
use Faker\Generator as Faker;

$factory->define(Transportadora::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'web' => 'https://www.' . $faker->domainName,
        'telefono' => $faker->phoneNumber,
        'notas' => $faker->text(),
        'created_by' => rand(1,10),
        'updated_by' => rand(1,10),
    ];
});
