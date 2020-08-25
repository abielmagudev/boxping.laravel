<?php

use Illuminate\Database\Seeder;

class MedidorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Medidor::class, 3)->create();
    }
}
