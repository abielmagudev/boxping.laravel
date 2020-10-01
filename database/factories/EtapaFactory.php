<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etapa;
use Faker\Generator as Faker;

$factory->define(Etapa::class, function (Faker $faker) {

    $nombre = 'Etapa ' . $faker->unique(true)->randomNumber();
    $slug = str_replace(' ', '-', $nombre);
    $peso_en = config('system.measures.peso');
    $volumen_en = config('system.measures.volumen');

    return [
        'nombre' => $nombre,
        'slug' => strtolower($slug),
        'descripcion' => $faker->sentence(),
        'realizar_medicion' => $faker->boolean ? 1 : 0,
        'peso_en' => $faker->randomElement($peso_en),
        'volumen_en' => $faker->randomElement($volumen_en),
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
    ];
});
