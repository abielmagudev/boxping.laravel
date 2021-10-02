<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Destinatario;

class DestinatarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Destinatario::factory(50)->create();
    }
}
