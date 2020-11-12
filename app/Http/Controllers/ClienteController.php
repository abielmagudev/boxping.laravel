<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Entrada;
use App\Http\Requests\ClienteSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('clientes.index')->with('clientes', Cliente::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('clientes.create')->with('cliente', new Cliente);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Cliente::prepare($request->validated());

        if(! $cliente = Cliente::create($prepared) )
            return back()->with('failure', 'Error al guardar cliente');

        return redirect()->route('clientes.index')->with('success', 'Cliente guardado');
    }

    public function show(Cliente $cliente)
    {
        $entradas = Entrada::with(['destinatario'])->where('cliente_id', $cliente->id)->orderBy('id', 'desc')->get();
        
        return view('clientes.show', [
            'cliente' => $cliente,
            'entradas' => $entradas,
            'entradas_take' => 10
        ]);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit')->with('cliente', $cliente);
    }

    public function update(SaveRequest $request, Cliente $cliente)
    {
        $prepared = Cliente::prepare($request->validated());

        if(! $cliente->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar cliente');
        
        return back()->with('success', 'Cliente actualizado');
    }

    public function destroy(Cliente $cliente)
    {
        if(! $cliente->delete() )
            return back()->with('failure', 'Error al eliminar cliente');
        
        return redirect()->route('clientes.index')->with('success', "{$cliente->nombre} ({$cliente->alias}) eliminado");
    }
}
