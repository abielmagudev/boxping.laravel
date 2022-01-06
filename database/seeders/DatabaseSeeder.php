<?php

namespace Database\Seeders;

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
        $this->call([

            // CATALOGOS
            AlertaSeeder::class,
            ClienteSeeder::class,
            CodigorSeeder::class,
            ConductorSeeder::class,
            ConfiguracionSeeder::class,
            DestinatarioSeeder::class,
            EtapaSeeder::class, // Relaciones: zonas
            // GuiaImpresionSeeder::class,
            IncidenteSeeder::class,
            ReempacadorSeeder::class,
            RemitenteSeeder::class,
            TransportadoraSeeder::class,
            VehiculoSeeder::class,
            UserSeeder::class,

            // OPERATIVAS
            ConsolidadoSeeder::class,
            EntradaSeeder::class, // Relaciones: comentarios, etapas(alertas), salida(incidentes)

        ]);
    }
}
