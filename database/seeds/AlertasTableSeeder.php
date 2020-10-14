<?php

use Illuminate\Database\Seeder;

class AlertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Alerta::class, 7)->create();
    }
}
