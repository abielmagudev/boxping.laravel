<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Reempacador;

class ReempacadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Reempacador::factory(10)->create();
    }
}
