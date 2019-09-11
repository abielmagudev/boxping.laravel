<?php

use Illuminate\Database\Seeder;

class CodigosrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Codigor::class, 10)->create();
    }
}
