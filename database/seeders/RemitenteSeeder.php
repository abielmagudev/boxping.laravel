<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Remitente;

class RemitenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Remitente::factory(50)->create();
    }
}
