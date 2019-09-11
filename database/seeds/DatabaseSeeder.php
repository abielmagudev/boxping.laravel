<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            ConsolidadosTableSeeder::class,
            ClientesTableSeeder::class,
            CodigosrTableSeeder::class,
            TransportadorasTableSeeder::class,
            ConductoresTableSeeder::class,
            EntradasTableSeeder::class,
            EntradaObservacionesTableSeeder::class,
        ]);
    }
}
