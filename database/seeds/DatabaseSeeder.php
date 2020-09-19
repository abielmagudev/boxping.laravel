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
            DestinatariosSeeder::class,
            MedidorTableSeeder::class,
            ReempacadoresTableSeeder::class,
            RemitentesTableSeeder::class,
            TransportadorasTableSeeder::class,
            UsersTableSeeder::class,
            VehiculosTableSeeder::class,
            EntradasTableSeeder::class,
            EntradaObservacionesTableSeeder::class,
            EntradaMedidasTableSeeder::class,
        ]);
    }
}
