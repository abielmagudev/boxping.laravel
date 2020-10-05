<?php

use Illuminate\Database\Seeder;

class EntradaComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Comentario::class, 40)->create();
    }
}
