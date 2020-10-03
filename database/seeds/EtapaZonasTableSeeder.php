<?php

use Illuminate\Database\Seeder;

class EtapaZonasTableSeeder extends Seeder
{
    public function run()
    {
        return factory(App\Zona::class, 100)->create();
    }
}
