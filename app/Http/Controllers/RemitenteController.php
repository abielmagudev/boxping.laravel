<?php

namespace App\Http\Controllers;

use App\Remitente;
use App\Entrada;
use App\Ahex\Remitente\Application\RoutingTrait as Routing;
use App\Ahex\Remitente\Application\RelationsTrait as Relations;
use App\Http\Requests\RemitenteSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class RemitenteController extends Controller
{
    use Routing, Relations;

    public function index()
    {
        return view('remitentes.index')->with('remitentes', Remitente::orderBy('id', 'desc')->paginate(16));
    }

    public function create(Request $request)
    {
        $entrada_id = $request->input('entrada', false);

        return view('remitentes.create', [
            'remitente' => new Remitente,
            'entrada_id' => $entrada_id,
            'goback' => $this->routeGoback($entrada_id),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Remitente::prepare( $request->validated() );

        if(! $remitente = Remitente::create($prepared) )
            return back()->with('failure', 'Error al guardar remitente');

        $route = $this->routeAfterStore($request->input('entrada', false), $remitente->nombre);
        return redirect($route)->with('success', 'Remitente guardardo');
    }

    public function show(Remitente $remitente)
    {
        return view('remitentes.show', [
            'remitente' => $remitente,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('remitente_id', $remitente->id)->get(),
        ]);
    }

    public function edit(Request $request, Remitente $remitente)
    {
        $entrada_id = $request->input('entrada', false);
        $this->validateRelationshipEntrada($entrada_id, $remitente->id);

        return view('remitentes.edit', [
            'remitente' => $remitente,
            'goback' => $this->routeGoback($entrada_id, $remitente->id),
        ]);
    }

    public function update(SaveRequest $request, Remitente $remitente)
    {
        $prepared = Remitente::prepare( $request->validated() );
        
        if(! $remitente->fill( $prepared )->save() )
            return back()->with('failure', 'Error al actualizar remitente');

        return back()->with('success', 'Remitente actualizado');
    }

    public function destroy(Remitente $remitente)
    {
        if(! $remitente->delete() )
            return back()->with('failure', 'Error al eliminar remitente');

        return redirect()->route('remitentes.index')->with('success', 'Remitente eliminado');
    }
}
