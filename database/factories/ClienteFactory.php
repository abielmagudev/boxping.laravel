<?php

namespace Database\Factories;

use App\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $alias = 'C' . substr($this->faker->company, 0, 2) . $this->faker->randomDigit . $this->faker->lexify('?');

        return [
            'nombre' => $this->faker->company,
            'alias' => $alias,
            'contacto' => $this->faker->name(),
            'telefono' => $this->faker->phoneNumber,
            'correo_electronico' => $this->faker->safeEmail,
            'direccion' => $this->faker->streetAddress,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'pais' => $this->faker->country,
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
