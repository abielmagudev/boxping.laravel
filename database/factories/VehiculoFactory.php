<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehiculo;
use Faker\Generator as Faker;

$factory->define(Vehiculo::class, function (Faker $faker) {
    return [
        'nombre' => 'Vehiculo #' . $faker->unique(true)->randomNumber . chr(rand(65,90)),
        'descripcion' => $faker->text(),
        'created_by' => rand(1,10),
        'updated_by' => rand(1,10),
    ];
});
