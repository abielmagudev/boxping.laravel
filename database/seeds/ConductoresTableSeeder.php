<?php

use Illuminate\Database\Seeder;

class ConductoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Conductor::class, 5)->create();
    }
}
