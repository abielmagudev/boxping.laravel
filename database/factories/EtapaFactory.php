<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etapa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Etapa::class, function (Faker $faker) {

    $nombre = 'Stage ' . $faker->unique(true)->randomNumber();
    $slug = Str::slug($nombre);
    $mediciones = $faker->numberBetween(0,2);
    $mediciones_peso = array_keys(config('system.mediciones.peso'));
    $mediciones_volumen = array_keys(config('system.mediciones.longitud'));

    return [
        'nombre' => $nombre,
        'slug' => $slug,
        'orden' => $faker->numberBetween(1, 20),
        'mediciones' => $mediciones,
        'medicion_peso' => $mediciones >= 1 ? $faker->randomElement($mediciones_peso) : null,
        'medicion_volumen' => $mediciones == 2 ? $faker->randomElement($mediciones_volumen) : null,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
    ];
});
