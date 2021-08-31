<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GuiaImpresion;
use Faker\Generator as Faker;

$factory->define(GuiaImpresion::class, function (Faker $faker) {
    return [
        'nombre' => 'Información completa',
        'formato_json' => json_encode([]),
        'margenes_json' => json_encode([]),
        'tipografia_json' => json_encode([]),
        'contenido_json' => json_encode([]),
    ];
});
