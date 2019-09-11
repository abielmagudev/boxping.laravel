<?php

use Illuminate\Database\Seeder;

class ReempacadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Reempacador::class, 10)->create();
    }
}
