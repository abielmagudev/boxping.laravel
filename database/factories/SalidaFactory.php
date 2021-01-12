<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salida;
use Faker\Generator as Faker;

$config_coberturas = array_keys( config('system.salidas.cobertura') );
$config_status = array_keys( config('system.salidas.status') );

$factory->define(Salida::class, function (Faker $faker) use ($config_coberturas, $config_status) {
    
    $cobertura = $faker->randomElement($config_coberturas);

    if( $cobertura == 'ocurre' )
    {
        $direccion = $faker->streetAddress;
        $postal = $faker->postcode;
        $ciudad = $faker->city;
        $estado = $faker->state;
        $pais = $faker->country;
    }
    
    return [
        'rastreo' => $faker->ean8,
        'confirmacion' => $faker->isbn13,
        'cobertura' => $cobertura,
        'direccion' => $direccion ?? null,
        'postal' => $postal ?? null,
        'ciudad' => $ciudad ?? null,
        'estado' => $estado ?? null,
        'pais' => $pais ?? null,
        'notas' => $faker->boolean ? $faker->sentence : null,
        'status' => $faker->randomElement($config_status),
        'transportadora_id' => $faker->numberBetween(1,10),
        'entrada_id' => $faker->numberBetween(1,75),
        'created_by' => $faker->numberBetween(1,10),
        'updated_by' => $faker->numberBetween(1,10),
    ];
});
