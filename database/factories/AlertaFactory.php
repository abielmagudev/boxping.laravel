<?php

namespace Database\Factories;

use App\Alerta;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlertaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alerta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nivel = $this->faker->randomElement( $this->model::getNombresNiveles() );
        $nombre  = ucfirst($nivel) . $this->faker->unique(true)->numberBetween(1,50) . $this->faker->lexify('?');

        return [
            'nivel' => $nivel,
            'nombre' => $nombre,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
