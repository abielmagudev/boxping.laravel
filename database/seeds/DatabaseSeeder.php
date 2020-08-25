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
            ClientesTableSeeder::class,
            CodigosrTableSeeder::class,
            ConductoresTableSeeder::class,
            ConsolidadosTableSeeder::class,
            DestinatarioSeeder::class,
            MedidorTableSeeder::class,
            ObservacionesTableSeeder::class,
            ReempacadoresTableSeeder::class,
            ReempacadoresTableSeeder::class,
            RemitentesTableSeeder::class,
            TransportadorasTableSeeder::class,
            UsersTableSeeder::class,
            VehiculosTableSeeder::class,
            EntradaMedidasTableSeeder::class,
            EntradasTableSeeder::class,
        ]);
    }
}
