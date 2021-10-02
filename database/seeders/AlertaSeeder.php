<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Alerta;

class AlertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Alerta::factory(10)->create();
    }
}
