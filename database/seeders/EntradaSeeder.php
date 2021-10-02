<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory; 
use App\Entrada;
use App\Comentario;
use App\Etapa;
use App\Alerta;
use App\Salida;
use App\Incidente;

class EntradaSeeder extends Seeder
{
    private $fakerphp;
    private $etapas_all, $alertas_all;
    private $salida_all_status, $salida_all_coberturas;
    private $incidentes_all;

    public function __construct()
    {        
        $this->fakerphp    = Factory::create();
        $this->etapas_all  = Etapa::all();
        $this->alertas_all = Alerta::all();
        $this->salida_all_status = Salida::getAllStatusNombres();
        $this->salida_all_coberturas = Salida::getAllCoberturasNombres();
        $this->incidentes_all = Incidente::all();
    }

    public function run()
    {
        $entradas = Entrada::factory(100)->create();

        foreach( $entradas as $entrada )
        {
            $this->seedComentarios($entrada);
            $this->seedEtapas($entrada);
            $this->seedSalida($entrada);

            if( $entrada->id === 100 )
                $this->command->getOutput()->writeln("<info>Seeded:</info>  Comentarios, etapas y salida de entradas");
        }
    }

    public function seedComentarios(Entrada $entrada)
    {
        $counter = $this->fakerphp->numberBetween(1,10);

        while( $counter > 1 )
        {
            Comentario::create([
                'entrada_id' => $entrada->id,
                'contenido'  => $this->fakerphp->text(),
                'created_by' => $this->fakerphp->numberBetween(1,10),
            ]);

            $counter--;
        }
    }

    public function seedEtapas(Entrada $entrada)
    {
        $counter = $this->fakerphp->numberBetween(1,10); // Cantidad de etapas aleatorias

        while( $counter > 1 )
        {
            $etapa_random   = $this->etapas_all->random(); // Solo una etapa aleatoria
            $alertas_random = $this->alertas_all->random( mt_rand(0,10) ); // Cantidad de alertas aleatorias

            $entrada->etapas()->attach($etapa_random->id, [
                'peso'             => $etapa_random->hasTarea('peso') ? $this->fakerphp->randomFloat(2, 0.1, 999) : null,
                'ancho'            => $etapa_random->hasTarea('volumen') ? $this->fakerphp->randomFloat(2, 0.1, 999) : null,
                'altura'           => $etapa_random->hasTarea('volumen') ? $this->fakerphp->randomFloat(2, 0.1, 999) : null,
                'largo'            => $etapa_random->hasTarea('volumen') ? $this->fakerphp->randomFloat(2, 0.1, 999) : null,
                'medicion_peso'    => $this->fakerphp->randomElement( $etapa_random->abreviacionesMedicionesPeso() ),
                'medicion_volumen' => $this->fakerphp->randomElement( $etapa_random->abreviacionesMedicionesVolumen() ),
                'zona_id'          => $this->fakerphp->boolean ? $this->fakerphp->numberBetween(1,5) : null,
                'alertas_id'       => $alertas_random->count() ? $alertas_random->pluck('id')->toJson() : null,
                'created_by'       => $this->fakerphp->numberBetween(1,10),
                'updated_by'       => $this->fakerphp->numberBetween(1,10),
            ]);

            $counter--;
        }
    }

    public function seedSalida(Entrada $entrada)
    {
        if( ! $entrada->haveDestinatario() || ! $entrada->haveConfirmacion() )
            return;
        
        $cobertura = $this->fakerphp->randomElement( $this->salida_all_coberturas );
        $is_cobertura_ocurre = $cobertura === 'ocurre';

        $salida = Salida::create([
            'rastreo' => $this->fakerphp->ean8,
            'confirmacion' => $this->fakerphp->isbn13,
            'cobertura' => $cobertura,
            'direccion' => $is_cobertura_ocurre ? $this->fakerphp->streetAddress : null,
            'postal' => $is_cobertura_ocurre ? $this->fakerphp->postcode : null,
            'ciudad' => $is_cobertura_ocurre ? $this->fakerphp->city : null,
            'estado' => $is_cobertura_ocurre ? $this->fakerphp->state : null,
            'pais' => $is_cobertura_ocurre ? $this->fakerphp->country : null,
            'notas' => $this->fakerphp->boolean ? $this->fakerphp->sentence : null,
            'status' => $this->fakerphp->randomElement( $this->salida_all_status ),
            'transportadora_id' => $this->fakerphp->numberBetween(1,10),
            'entrada_id' => $entrada->id,
            'created_by' => $this->fakerphp->numberBetween(1,10),
            'updated_by' => $this->fakerphp->numberBetween(1,10),
        ]);

        if( $this->fakerphp->boolean ) // True: Agrega incidentes aleatorios a la salida
        {
            $incidentes_random_id = $this->incidentes_all->random( mt_rand(1,10) )->pluck('id')->toArray();
            return $salida->incidentes()->sync( $incidentes_random_id );
        }
    }
}
