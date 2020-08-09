<?php

use Illuminate\Database\Seeder;

class RemitentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Remitente::class, 25)->create();
    }
}
