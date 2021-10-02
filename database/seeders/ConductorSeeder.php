<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Conductor;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Conductor::factory(10)->create();
    }
}
