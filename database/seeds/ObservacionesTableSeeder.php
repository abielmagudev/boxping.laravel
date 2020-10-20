<?php

use Illuminate\Database\Seeder;

class ObservacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Observacion::class, 7)->create();
    }
}
