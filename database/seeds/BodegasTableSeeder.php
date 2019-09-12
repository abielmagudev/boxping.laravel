<?php

use Illuminate\Database\Seeder;

class BodegasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Bodega::class, 5)->create();
    }
}
