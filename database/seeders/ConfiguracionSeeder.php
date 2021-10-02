<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Configuracion;
use Faker\Generator as Faker;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $fakerphp)
    {
        return Configuracion::create([
            'cliente_alias_numero' => (int) $fakerphp->boolean, // intval(bool)
        ]);
    }
}
