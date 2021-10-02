<?php

namespace Database\Factories;

use App\Incidente;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incidente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique(true)->colorName . ' ' . $this->faker->numberBetween(1,60),
            'descripcion' => $this->faker->boolean ? $this->faker->sentence : null,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
