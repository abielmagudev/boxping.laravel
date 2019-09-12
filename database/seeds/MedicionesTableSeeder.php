<?php

use Illuminate\Database\Seeder;

class MedicionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Medicion::class, 3)->create();
    }
}
