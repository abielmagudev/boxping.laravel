<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Transportadora;

class TransportadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Transportadora::factory(10)->create();
    }
}
