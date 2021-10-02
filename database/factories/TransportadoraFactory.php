<?php

namespace Database\Factories;

use App\Transportadora;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportadoraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transportadora::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'web' => $this->faker->url,
            'telefono' => $this->faker->phoneNumber,
            'notas' => $this->faker->text(),
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
