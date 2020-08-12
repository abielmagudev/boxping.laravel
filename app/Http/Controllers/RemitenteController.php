<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveRemitenteRequest;
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
        if(! $request->has('entrada') )
            return back();

        return view('remitentes.create', [
            'remitente' => new Remitente,
            'entrada' => Entrada::find($request->get('entrada')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRemitenteRequest $request)
    {
        $to_store = $this->prepareToStore( $request->validated() );

        if(! $remitente = Remitente::create($to_store) )
            return back()->with('failure', 'Error al agregar remitente');

        return redirect()->route('entradas.show', $remitente->entrada_id)->with('success', 'Remitente agregado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remitente = Remitente::find($id);

        return view('remitentes.edit', [
            'remitente' => $remitente,
            'entrada' => Entrada::find($remitente->entrada_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRemitenteRequest $request, $id)
    {
        $remitente = Remitente::find($id);

        if(! $remitente->update($request->validated()) )
            return back()->with('failure', 'Error al actualizar remitente');

        return redirect()->route('entradas.show', $remitente->entrada_id)->with('success', 'Remitente actualizado');
    }
}
