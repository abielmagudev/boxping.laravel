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
            BodegasTableSeeder::class,
            ClientesTableSeeder::class,
            CodigosrTableSeeder::class,
            ConductoresTableSeeder::class,
            ConsolidadosTableSeeder::class,
            MedicionesTableSeeder::class,
            ReempacadoresTableSeeder::class,
            TransportadorasTableSeeder::class,
            VehiculosTableSeeder::class,
            EntradaObservacionesTableSeeder::class,
            EntradasTableSeeder::class,
        ]);
    }
}
