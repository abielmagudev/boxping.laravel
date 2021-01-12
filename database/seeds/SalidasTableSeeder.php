<?php

use Illuminate\Database\Seeder;

class SalidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Salida::class, 10)->create();
    }
}
