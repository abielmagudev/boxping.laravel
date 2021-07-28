<?php

use Illuminate\Database\Seeder;

class ConfiguracionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Configuracion::class, 1)->create();
    }
}
