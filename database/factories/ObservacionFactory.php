<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Observacion;
use Faker\Generator as Faker;

$tipos = array_keys( config('system.observaciones') );

$factory->define(Observacion::class, function (Faker $faker) use ($tipos) {

    $observacion_tipo = $faker->randomElement( $tipos );
    $observacion_nombre = ucfirst($observacion_tipo) . ' ' . $faker->unique(true)->numberBetween(1,21);

    return [
        'tipo' => $observacion_tipo,
        'nombre' => $observacion_nombre,
        'descripcion' => $faker->sentence,
    ];
});
