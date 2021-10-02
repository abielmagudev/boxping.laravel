<?php

namespace Database\Factories;

use App\Remitente;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemitenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Remitente::class;

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
            'telefono' => $this->faker->phoneNumber,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
