<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consolidado;
use Faker\Generator as Faker;

$all_status = Consolidado::getAllStatusClaves();

$factory->define(Consolidado::class, function (Faker $faker) use($all_status) {
    return [
        'numero' => $faker->unique(true)->randomNumber . time() . chr(rand(65,90)),
        'tarimas' => $faker->numberBetween(1,5),
        'status' => $faker->randomElement( $all_status ),
        'notas' => $faker->boolean ? $faker->sentence() : null,
        'cliente_id' => $faker->numberBetween(1,10),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
