<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RemitenteSaveRequest;
use App\Remitente;
use App\Entrada;

class RemitenteController extends Controller
{
    use Traits\RemitenteSaveTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( Remitente::where('entrada_id', $request->input('entrada', null))->exists() ) 
            return back();

        return view('remitentes.create', [
            'entrada'   => Entrada::find($request->get('entrada')),
            'remitente' => new Remitente,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemitenteSaveRequest $request)
    {
        $to_store = $this->prepareToStore( $request->validated() );
        if(! $remitente = Remitente::create($to_store) )
            return back()->with('failure', 'Error al agregar remitente');

        return redirect()
                ->route('entradas.show', $remitente->entrada_id)
                ->with('success', 'Remitente agregado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(! $remitente = Remitente::find($id) )
            return back();

        return view('remitentes.edit', [
            'entrada' => Entrada::find($remitente->entrada_id),
            'remitente' => $remitente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RemitenteSaveRequest $request, $id)
    {
        if(! $remitente = Remitente::find($id) )
            return back();

        $to_update = $this->prepareToUpdate($request->validated());
        if(! $remitente->update($to_update) )
            return back()->with('failure', 'Error al actualizar remitente');

        return redirect()->route('entradas.show', $remitente->entrada_id)->with('success', 'Remitente actualizado');
    }
}
