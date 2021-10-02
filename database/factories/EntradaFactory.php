<?php

namespace Database\Factories;

use App\Entrada;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntradaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entrada::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_importado   = $this->faker->boolean;
        $is_reempacado  = $this->faker->boolean;
        $is_confirmado  = $this->faker->boolean;
    
        return [
            // Entrada
            'numero' => $this->faker->creditCardNumber, // Before: $this->faker->unique()->uuid
            'consolidado_id' => $this->faker->boolean ? $this->faker->numberBetween(1,10) : null,
            'cliente_id' => $this->faker->numberBetween(1,10),
            'contenido' => $this->faker->boolean ? $this->faker->sentence() : null,
    
            // Trayectoria 
            'destinatario_id' => $this->faker->boolean ? $this->faker->numberBetween(1,50) : null,
            'remitente_id' => $this->faker->boolean ? $this->faker->numberBetween(1,50) : null,
    
            // Importacion
            'vehiculo_id' => $is_importado ? $this->faker->numberBetween(1,10) : null,
            'conductor_id' => $is_importado ? $this->faker->numberBetween(1,10) : null,
            'numero_cruce' => $is_importado ? $this->faker->randomDigit : null,
            'importado_fecha' => $is_importado ? $this->faker->date() : null,
            'importado_hora' => $is_importado ? $this->faker->time() : null,
    
            // Reempaque
            'codigor_id' => $is_reempacado ? $this->faker->numberBetween(1,10) : null,
            'reempacador_id' => $is_reempacado ? $this->faker->numberBetween(1,10) : null,
            'reempacado_fecha' => $is_reempacado ? $this->faker->date() : null,
            'reempacado_hora' => $is_reempacado ? $this->faker->time() : null,
    
            // Confirmación
            'confirmado_by' => $is_confirmado ? $this->faker->numberBetween(1,10) : null,
            'confirmado_at' => $is_confirmado ? $this->faker->dateTime() : null,
    
            // Log
            'created_by' => $this->faker->numberBetween(1,10),
            'updated_by' => $this->faker->numberBetween(1,10),
        ];
    }
}
