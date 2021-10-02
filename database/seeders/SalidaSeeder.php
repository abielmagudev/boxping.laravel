<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Salida::factory(50)->create();
    }
}
