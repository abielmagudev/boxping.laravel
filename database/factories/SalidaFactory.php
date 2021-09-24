<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salida;
use Faker\Generator as Faker;

$all_status_nombres = Salida::getAllStatusNombres();
$all_coberturas_nombres = Salida::getAllCoberturasNombres();

$factory->define(Salida::class, function (Faker $faker) use ($all_status_nombres, $all_coberturas_nombres) {
    
    $cobertura = $faker->randomElement($all_coberturas_nombres);

    if( $cobertura === 'ocurre' )
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
        'status' => $faker->randomElement($all_status_nombres),
        'transportadora_id' => $faker->numberBetween(1,10),
        'entrada_id' => $faker->numberBetween(1,50),
        'created_by' => $faker->numberBetween(1,10),
        'updated_by' => $faker->numberBetween(1,10),
    ];
});
