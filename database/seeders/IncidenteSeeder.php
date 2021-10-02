<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Incidente;

class IncidenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Incidente::factory(10)->create();
    }
}
