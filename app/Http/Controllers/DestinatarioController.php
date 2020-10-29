<?php

namespace App\Http\Controllers;

use App\Destinatario;
use App\Entrada;
use App\Ahex\Destinatario\Application\RoutingTrait as Routing;
use App\Ahex\Destinatario\Application\RelationsTrait as Relations;
use App\Http\Requests\DestinatarioSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class DestinatarioController extends Controller
{
    use Routing, Relations;

    public function index()
    {
        return view('destinatarios.index')->with('destinatarios', Destinatario::orderBy('id', 'desc')->paginate());
    }

    public function create(Request $request)
    {
        $entrada_id = $request->input('entrada', false);

        return view('destinatarios.create', [
            'destinatario' => new Destinatario,
            'returning' => $this->routeReturning($entrada_id),
            'entrada_id' => $entrada_id,
        ]);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Destinatario::prepare($request->validated());

        if(! $destinatario = Destinatario::create($prepared) )
            return back()->with('failure','Error al guardar destinatario');
        
        $route = $this->routeAfterStore($request->input('entrada', false), $destinatario->nombre);
        return redirect($route)->with('success', 'Destinatario guardado');
    }

    public function show(Destinatario $destinatario)
    {
        return view('destinatarios.show', [
            'destinatario' => $destinatario,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('destinatario_id', $destinatario->id)->get()
        ]);
    }

    public function edit(Request $request, Destinatario $destinatario)
    {
        $entrada_id = $request->input('entrada', false);
        $this->validateRelationshipEntrada($entrada_id, $destinatario->id);

        return view('destinatarios.edit', [
            'destinatario' => $destinatario,
            'returning' => $this->routeReturning($entrada_id, $destinatario->id),
        ]);
    }

    public function update(SaveRequest $request, Destinatario $destinatario)
    {
        $prepared = Destinatario::prepare( $request->validated() );
        
        if(! $destinatario->fill( $prepared )->save() )
            return back()->with('failure', 'Error al actualizar destinatario');

        return back()->with('success', 'Destinatario actualizado');
    }

    public function destroy(Destinatario $destinatario)
    {
        if(! $destinatario->delete() )
            return back()->with('failure', 'Error al eliminar destinatario');
        
        return redirect()->route('destinatarios.index')->with('success', 'Destinatario eliminado');
    }
}
