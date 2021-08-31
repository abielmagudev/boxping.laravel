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
            AlertasTableSeeder::class,
            ClientesTableSeeder::class,
            CodigosrTableSeeder::class,
            ConductoresTableSeeder::class,
            ConfiguracionesTableSeeder::class,
            ConsolidadosTableSeeder::class,
            DestinatariosSeeder::class,
            EntradasTableSeeder::class,
            EtapasTableSeeder::class,
            GuiasImpresionTableSeeder::class,
            IncidentesTableSeeder::class,
            ReempacadoresTableSeeder::class,
            RemitentesTableSeeder::class,
            SalidasTableSeeder::class,
            TransportadorasTableSeeder::class,
            UsersTableSeeder::class,
            VehiculosTableSeeder::class,
            EntradaComentariosTableSeeder::class,
            EntradaEtapaTableSeeder::class,
            EtapaZonasTableSeeder::class,
        ]);
    }
}
