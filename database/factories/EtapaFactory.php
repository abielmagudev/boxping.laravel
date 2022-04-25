<?php

namespace Database\Factories;

use App\Etapa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtapaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etapa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = 'Stage ' . $this->faker->unique(true)->randomNumber() . $this->faker->lexify('?');

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'orden' => $this->faker->numberBetween(1, 20),
            'tareas_encoded' => $this->faker->boolean ? json_encode( Etapa::tareas(true) ) : null,
            'unica_medicion_peso' => $this->faker->boolean ? $this->faker->randomElement( Etapa::medicionesPeso(true) ) : null,
            'unica_medicion_volumen' => $this->faker->boolean ? $this->faker->randomElement( Etapa::medicionesVolumen(true) ) : null,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
