<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Codigor;

class CodigorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Codigor::factory(10)->create();
    }
}
