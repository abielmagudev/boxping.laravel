<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
use App\Etapa;
use App\Zona;

class EtapaSeeder extends Seeder
{
    private $fakerphp;

    public function __construct(Faker $faker)
    {
        $this->fakerphp = $faker;
    }

    public function run()
    {
        $etapas = Etapa::factory(10)->create();

        foreach( $etapas as $etapa )
            $this->seedZonas($etapa);

        return $this->command->getOutput()->writeln("<info>Seeded:</info>  Zonas en etapas");
    }

    public function seedZonas(Etapa $etapa)
    {
        $counter = mt_rand(0, 10);

        while( $counter > 0 )
        {
            Zona::create([
                'nombre' => strtoupper($this->fakerphp->fileExtension()) . '-ZoNe',
                'descripcion' => $this->fakerphp->sentence(),
                'etapa_id' => $etapa->id,
            ]);

            $counter--;
        }
    }
}
