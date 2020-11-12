<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entrada;
use Faker\Generator as Faker;

$factory->define(Entrada::class, function (Faker $faker) {

    $cruce_id   = $faker->boolean;
    $codigor_id = $faker->boolean;
    $confirmado = $faker->boolean;

    return [
        
        // Entrada
        'numero' => $faker->unique()->uuid,
        'consolidado_id' => $faker->boolean ? $faker->numberBetween(1,10) : null,
        'cliente_alias_numero' => $faker->boolean ? 1 : 0,
        'cliente_id' => $faker->numberBetween(1,10),

        // Trayectoria 
        'destinatario_id' => $faker->boolean ? $faker->numberBetween(1,50) : null,
        'remitente_id' => $faker->boolean ? $faker->numberBetween(1,50) : null,

        // Importacion
        'vehiculo_id' => $cruce_id ? rand(1,10) : null,
        'conductor_id' => $cruce_id ? rand(1,5) : null,
        'numero_cruce' => $cruce_id ? $faker->randomDigit : null,
        'importado_fecha' => $cruce_id ? $faker->date() : null,
        'importado_hora' => $cruce_id ? $faker->time() : null,

        // Reempaque
        'codigor_id' => $codigor_id ? rand(1,10) : null,
        'reempacador_id' => $codigor_id ? rand(1,10) : null,
        'reempacado_fecha' => $codigor_id ? $faker->date() : null,
        'reempacado_hora' => $codigor_id ? $faker->time() : null,

        // Confirmación
        'confirmado_by' => $confirmado ? $faker->numberBetween(1,10) : null,
        'confirmado_at' => $confirmado ? $faker->dateTime() : null,

        // Log
        'created_by' => $faker->numberBetween(1,10),
        'updated_by' => $faker->numberBetween(1,10),
    ];
});
