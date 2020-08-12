<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveDestinatarioRequest;
use App\Entrada;
use App\Destinatario;

class DestinatarioController extends Controller
{
    use \App\Http\Controllers\Traits\DestinatarioSaveTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(! $entrada = Entrada::find( $request->get('entrada') ) )
            return back();

        if( is_object($entrada->destinatario) )
            return back();

        return view('destinatarios.create', [
            'destinatario' => new Destinatario,
            'entrada' => $entrada,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveDestinatarioRequest $request)
    {
        $to_store = $this->prepareToStore( $request->validated() );

        if(! $destinatario = Destinatario::create($to_store) )
        {
            return back()
                    ->with('failure','Error al agregar destinatario');
        }
        
        return redirect()
                ->route('entradas.show', $destinatario->entrada_id)
                ->with('success', 'Destinatario agregado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !$destinatario = Destinatario::find($id) )
            return back();

        return view('destinatarios.edit', [
             'destinatario' => $destinatario,
             'entrada' => Entrada::find( $destinatario->entrada_id ),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveDestinatarioRequest $request, $id)
    {
        if(! $destinatario = Destinatario::find($id) )
            return back()->with('failure', 'Destinatario no existe');

        $to_update = $this->prepareToUpdate($request->validated(), $destinatario);

        if(! $destinatario->update($to_update) )
            return back()->with('failure', 'Error al actualizar destinatario');
        
        return redirect()->route('entradas.show', $destinatario->entrada_id)->with('success', 'Destinatario actualizado');
    }
}
