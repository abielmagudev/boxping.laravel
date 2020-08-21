<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntradaCreateRequest;
use App\Http\Requests\EntradaStoreRequest;
use App\Http\Requests\EntradaEditRequest;
use App\Http\Requests\EntradaUpdateRequest;

use App\Http\Controllers\Extended\Entrada\FactoryEditor;
use App\Http\Controllers\Extended\Entrada\FactoryUpdater;

use App\Consolidado;
use App\Entrada;
use App\Observacion;
use App\Cliente;
use App\Vehiculo;
use App\Conductor;
use App\Codigor;
use App\Reempacador;

class EntradaController extends Controller
{
    use Traits\Userlive,
        Traits\EntradaStore;

    public function index()
    {
        return view('entradas.index', [
            'entradas' => Entrada::all()->sortByDesc('id'),
        ]);
    }

    public function create(EntradaCreateRequest $request)
    {        
        return view('entradas.create', [
            'consolidado'  => $request->has('consolidado') ? Consolidado::find($request->get('consolidado')) : false,
            'clientes'     => Cliente::where('disponible', 1)->get(['id','nombre','alias']),
            'entrada'      => new Entrada,
            'url_previous' => $request->has('consolidado') ? route('consolidados.show', $request->get('consolidado')) : route('entradas.index'),
        ]);
    }

    public function store(EntradaStoreRequest $request)
    {
        if(! $entrada = $this->storeEntrada($request) )
            return back()->with('failure', 'Error al guardar entrada');
        
        $route = $entrada->consolidado_id ? route('consolidados.show', $entrada->consolidado_id) : route('entradas.index');
        return redirect($route)->with('success', 'Entrada guardada');
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', [
            'entrada' => $entrada,
            'observaciones' => Observacion::with(['user'])->where('entrada_id', $entrada->id)->orderBy('id', 'desc')->get(),
        ]);
    }

    public function edit(Entrada $entrada, EntradaEditRequest $request)
    {
        $editor = FactoryEditor::make($request->get('form'), [
            'entrada' => $entrada
        ]);

        return $editor->view();
    }

    public function update(EntradaUpdateRequest $request, Entrada $entrada)
    {
        $updater = FactoryUpdater::make($request->get('update'), [
            'request' => $request,
            'entrada' => $entrada,
        ]);
        
        if(! $updater->save() )
            return back()->with('failure', $updater->message(false));
        
        return back()->with('success', $updater->message(true));
    }

    public function destroy(Entrada $entrada)
    {
        //
    }
}
