<?php

use Illuminate\Database\Seeder;

class EntradaMedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Medida::class, 200)->create();
    }
}
