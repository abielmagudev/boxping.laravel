<?php

namespace Database\Factories;

use App\Reempacador;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReempacadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reempacador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'clave' => hash('gost', 123),
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
