<?php

namespace App\Ahex\Entrada\Application;

use App\Entrada;
use App\Destinatario;
use App\Remitente;

use Illuminate\Http\Request;

trait TrayectoriaTrait
{
    public function agregarRemitente(Request $request, Entrada $entrada)
    {
        return view('entradas.edit.remitente',[
            'entrada' => $entrada,
            'remitentes' => $request->filled('search') ? Remitente::search( $request->search ) : null,
            'searched' => $request->input('search', '...'),
        ]);
    }

    public function agregarDestinatario(Request $request, Entrada $entrada)
    {        
        return view('entradas.edit.destinatario',[
            'entrada' => $entrada,
            'destinatarios' => $request->filled('search') ? Destinatario::search( $request->search ) : null,
            'searched' => $request->input('search', '...'),
        ]);
    }
}
