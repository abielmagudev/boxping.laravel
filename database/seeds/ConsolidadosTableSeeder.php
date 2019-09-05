<?php

use Illuminate\Database\Seeder;

class ConsolidadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Consolidado::class, 10)->create();
    }
}
