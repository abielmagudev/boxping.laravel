<?php

use Illuminate\Database\Seeder;

class EntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Entrada::class, 100)->create();
    }
}
