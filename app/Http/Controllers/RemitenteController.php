<?php

namespace App\Http\Controllers;

use App\Remitente;
use App\Entrada;

use App\Ahex\Remitente\Application\BelongsEntradaTrait as BelongsEntrada;
use App\Ahex\Remitente\Application\RoutesTrait as Routes;
use App\Ahex\Remitente\Application\StoreTrait as Store;
use App\Ahex\Remitente\Application\UpdateTrait as Update;

use App\Http\Requests\RemitenteSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class RemitenteController extends Controller
{
    use BelongsEntrada, Routes, Store, Update;

    public function index()
    {
        return view('remitentes.index', [
            'remitentes' => Remitente::orderBy('id', 'desc')->paginate(16)
        ]);
    }

    public function create()
    {
        return view('remitentes.create', [
            'remitente' => new Remitente,
            'entrada' => request('entrada', false),
            'route_cancel' => $this->routeCancel(),
        ]);
    }

    public function store(SaveRequest $request)
    {
        if(! $remitente = $this->storeRemitente($request) )
            return back()->with('failure', 'Error al guardar remitente');

        $route = $this->routeAfterStore($remitente->nombre);
        return redirect($route)->with('success', 'Remitente guardardo');
    }

    public function show(Remitente $remitente)
    {
        return view('remitentes.show', [
            'remitente' => $remitente,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('remitente_id', $remitente->id)->get(),
        ]);
    }

    public function edit(Remitente $remitente)
    {
        $this->comesFromEntrada($remitente->id);

        return view('remitentes.edit', [
            'remitente' => $remitente,
            'route_back' => $this->routeBack( $remitente->id ),
        ]);
    }

    public function update(SaveRequest $request, Remitente $remitente)
    {
        if(! $this->updateRemitente($request, $remitente) )
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
