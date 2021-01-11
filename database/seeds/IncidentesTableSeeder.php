<?php

use Illuminate\Database\Seeder;

class IncidentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(\App\Incidente::class, 20)->create();
    }
}
