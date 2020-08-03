<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveConsolidadoRequest;
use App\Consolidado;
use App\Cliente;

class ConsolidadoController extends Controller
{
    use Traits\ConsolidadoSaveTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consolidados/index', [
            'consolidados' => Consolidado::with('cliente')->orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consolidados.create', [
            'consolidado' => new Consolidado,
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveConsolidadoRequest $request)
    {
        $to_store = $this->prepareToStore( $request->validated() );
        if(! $consolidado = Consolidado::create($to_store) )
            return back()->withInput()->with('failure', 'Hubo una falla al guardar consolidado. Intenta de nuevo.');

        $route = $this->routeAfterStore($request->get('save'), $consolidado->id);
        return redirect($route)->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function show(Consolidado $consolidado)
    {
        return view('consolidados.show', [
            'consolidado' => $consolidado,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function edit(Consolidado $consolidado)
    {
        return view('consolidados.edit', [
            'consolidado' => $consolidado,
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function update(SaveConsolidadoRequest $request, Consolidado $consolidado)
    {
        $to_update = $this->prepareToUpdate( $request->validated() );
        if(! Consolidado::find($consolidado->id)->update( $to_update ) )
            return back()->with('failure', 'Hubo un error en la actualizacion del consolidado');

        return back()->with('success', "Consolidado {$consolidado->numero} actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consolidado $consolidado)
    {
        $numero = $consolidado->numero;

        if(! $consolidado->delete() )
            return back()->with('failure', 'Hubo un error al eliminar consolidado');

        return redirect()->route('consolidados.index')->with('success', "Consolidado {$numero} eliminado");
    }
}
