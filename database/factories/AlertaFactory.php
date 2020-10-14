<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alerta;
use Faker\Generator as Faker;

$niveles = array_keys( config('system.niveles_alerta') );

$factory->define(Alerta::class, function (Faker $faker) use ($niveles) {

    $alerta_nivel = $faker->randomElement( $niveles );
    $alerta_nombre = ucfirst($alerta_nivel) . ' ' . $faker->unique(true)->numberBetween(1,21);

    return [
        'nombre' => $alerta_nombre,
        'descripcion' => $faker->sentence,
        'nivel' => $alerta_nivel,
    ];
});
