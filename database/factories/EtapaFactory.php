<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etapa;
use Faker\Generator as Faker;

$factory->define(Etapa::class, function (Faker $faker) {

    $nombre = 'Stage ' . $faker->unique(true)->randomNumber();
    $slug = str_replace(' ', '-', $nombre);
    $realiza_medicion = $faker->boolean;
    $medidas_peso = config('system.measures.peso');
    $medidas_volumen = config('system.measures.volumen');

    return [
        'nombre' => $nombre,
        'slug' => strtolower($slug),
        'realiza_medicion' => $realiza_medicion ? 1 : 0,
        'medida_peso' => $realiza_medicion ? $faker->randomElement($medidas_peso) : null,
        'medida_volumen' => $realiza_medicion ? $faker->randomElement($medidas_volumen) : null,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
    ];
});
