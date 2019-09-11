<?php

use Illuminate\Database\Seeder;

class TransportadorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Transportadora::class, 10)->create();
    }
}
