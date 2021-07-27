<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alerta;
use Faker\Generator as Faker;

$niveles = array_keys( config('system.alertas') );

$factory->define(Alerta::class, function (Faker $faker) use ($niveles) {

    $alerta_nivel = $faker->randomElement( $niveles );
    $alerta_nombre = ucfirst($alerta_nivel) . $faker->unique(true)->numberBetween(1,20) . chr(rand(65,90));

    return [
        'nivel' => $alerta_nivel,
        'nombre' => $alerta_nombre,
        'descripcion' => $faker->sentence,
        'created_by' => rand(1,10),
        'updated_by' => rand(1,10),
    ];
});
