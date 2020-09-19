<?php

use Illuminate\Database\Seeder;

class DestinatariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Destinatario::class, 50)->create();
    }
}
