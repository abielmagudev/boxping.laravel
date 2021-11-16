<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Consolidado;

class ConsolidadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Consolidado::factory(25)->create();
    }
}
