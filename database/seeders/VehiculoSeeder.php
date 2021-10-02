<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Vehiculo::factory(10)->create();
    }
}
