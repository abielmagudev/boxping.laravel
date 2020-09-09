<?php

namespace App\Http\Controllers;

use App\Destinatario;
use App\Entrada;

use App\Ahex\Destinatario\Application\BelongsEntradaTrait as BelongsEntrada;
use App\Ahex\Destinatario\Application\RoutesTrait as Routes;
use App\Ahex\Destinatario\Application\StoreTrait as Store;
use App\Ahex\Destinatario\Application\UpdateTrait as Update;

use App\Http\Requests\DestinatarioSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class DestinatarioController extends Controller
{
    use BelongsEntrada,Routes,Store,Update;

    public function index()
    {
        return view('destinatarios.index', [
            'destinatarios' => Destinatario::orderBy('id', 'desc')->paginate(16),
        ]);
    }

    public function create()
    {
        return view('destinatarios.create', [
            'destinatario' => new Destinatario,
            'entrada' => request('entrada', false),
            'route_cancel' => $this->routeCancel(),
        ]);
    }

    public function store(SaveRequest $request)
    {
        if(! $destinatario = $this->storeDestinatario($request) )
            return back()->with('failure','Error al guardar destinatario');
        
        $route = $this->routeAfterStore( $destinatario->nombre );
        return redirect($route)->with('success', 'Destinatario guardado');
    }

    public function show(Destinatario $destinatario)
    {
        return view('destinatarios.show', [
            'destinatario' => $destinatario,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('destinatario_id', $destinatario->id)->get()
        ]);
    }

    public function edit(Destinatario $destinatario)
    {
        $this->comesFromEntrada($destinatario->id);

        return view('destinatarios.edit', [
            'destinatario' => $destinatario,
            'route_back' => $this->routeBack($destinatario->id),
        ]);
    }

    public function update(SaveRequest $request, Destinatario $destinatario)
    {
        if(! $this->updateDestinatario($request, $destinatario) )
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
