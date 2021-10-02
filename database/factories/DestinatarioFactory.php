<?php

namespace Database\Factories;

use App\Destinatario;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinatarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Destinatario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'direccion' => $this->faker->streetAddress,
            'postal' => $this->faker->postcode,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'pais' => $this->faker->country,
            'referencias' => $this->faker->boolean ? $this->faker->paragraph() : null,
            'telefono' => $this->faker->phoneNumber,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
