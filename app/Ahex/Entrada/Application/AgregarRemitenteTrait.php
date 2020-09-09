<?php

namespace App\Ahex\Entrada\Application;

use Illuminate\Http\Request;

use App\Entrada;
use App\Remitente;

trait AgregarRemitenteTrait
{
    public function agregarRemitente(Entrada $entrada)
    {
        return view('entradas.agregar.remitente',[
            'entrada' => $entrada,
            'remitentes' => request()->filled('search') ? Remitente::search( request('search') ) : null,
        ]);
    }
}
