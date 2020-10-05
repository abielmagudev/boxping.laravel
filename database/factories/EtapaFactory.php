<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etapa;
use Faker\Generator as Faker;

$factory->define(Etapa::class, function (Faker $faker) {

    $nombre = 'Stage ' . $faker->unique(true)->randomNumber();
    $slug = str_replace(' ', '-', $nombre);
    $medidas_peso = config('system.measures.peso');
    $medidas_volumen = config('system.measures.volumen');

    return [
        'nombre' => $nombre,
        'slug' => strtolower($slug),
        'realiza_medicion' => $faker->boolean ? 1 : 0,
        'medida_peso' => $faker->randomElement($medidas_peso),
        'medida_volumen' => $faker->randomElement($medidas_volumen),
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
    ];
});
