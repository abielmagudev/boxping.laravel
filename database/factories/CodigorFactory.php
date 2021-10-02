<?php

namespace Database\Factories;

use App\Codigor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodigorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Codigor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = 'R' . $this->faker->unique()->numberBetween(1,25);

        return [
            'nombre' => $nombre,
            'descripcion' => $this->faker->text(100),
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
