<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entrada;
use Faker\Generator as Faker;

$factory->define(Entrada::class, function (Faker $faker) {
    return [
        'numero' => $faker->uuid,
        'alias_cliente_numero' => $faker->numberBetween(0,1),
        'cliente_id' => $faker->numberBetween(1,10),
        'consolidado_id' => $faker->numberBetween(1,10),
        'created_by' => $faker->numberBetween(1,20),
        'updated_by' => $faker->numberBetween(1,20),
    ];
});
