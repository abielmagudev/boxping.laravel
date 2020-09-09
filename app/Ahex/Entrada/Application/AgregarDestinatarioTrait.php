<?php

namespace App\Ahex\Entrada\Application;

use Illuminate\Http\Request;

use App\Entrada;
use App\Destinatario;

trait AgregarDestinatarioTrait
{
    public function agregarDestinatario(Entrada $entrada)
    {        
        return view('entradas.agregar.destinatario',[
            'entrada' => $entrada,
            'destinatarios' => request()->filled('search') ? Destinatario::search( request('search') ) : null,
        ]);
    }
}
