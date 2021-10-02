<?php

namespace Database\Factories;

use App\Consolidado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsolidadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consolidado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $all_status = Consolidado::getAllStatusClaves();

        return [
            'numero' => $this->faker->unique(true)->randomNumber . ucfirst($this->faker->lexify('?')),
            'tarimas' => $this->faker->numberBetween(1,5),
            'status' => $this->faker->randomElement( $all_status ),
            'notas' => $this->faker->boolean ? $this->faker->sentence() : null,
            'cliente_id' => $this->faker->numberBetween(1,10),
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
