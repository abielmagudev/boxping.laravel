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
        $tareas_json = json_encode( Etapa::getTodasTareas(true) ); // true: Solo nombres
        $todas_mediciones_peso = Etapa::getTodasMedicionesPeso(true); // true: Solo claves|abreviaciones
        $todas_mediciones_volumen = Etapa::getTodasMedicionesVolumen(true); // true: Solo claves|abreviaciones

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'orden' => $this->faker->numberBetween(1, 20),
            'json_tareas' => $this->faker->boolean ? $tareas_json : null,
            'medicion_unica_peso' => $this->faker->boolean ? $this->faker->randomElement( $todas_mediciones_peso ) : null,
            'medicion_unica_volumen' => $this->faker->boolean ? $this->faker->randomElement( $todas_mediciones_volumen ) : null,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
