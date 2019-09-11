<?php

use Illuminate\Database\Seeder;

class EntradaObservacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Observacion::class, 40)->create();
    }
}
