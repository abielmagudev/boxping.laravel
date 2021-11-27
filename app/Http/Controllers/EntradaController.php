<?php

namespace App\Http\Controllers;

use App\Ahex\Zowner\Application\HasValidations;
use App\Ahex\Entrada\Application\StoreCalled\Redirects\StoredRedirect;
use App\Ahex\Entrada\Application\EditCalled\Editors\EditorsContainer;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;

use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use App\Http\Requests\EntradaPrintManyRequest as PrintManyRequest;
use Illuminate\Http\Request;

use App\Consolidado;
use App\Entrada;
use App\GuiaImpresion;

class EntradaController extends Controller
{
    use HasValidations;

    public function index(Request $request)
    {
        $entradas = Entrada::with(['consolidado','cliente','destinatario'])
                            ->filterByRequest( $request->all() )
                            ->getFiltered( $request->input('muestreo', 25) );

        $has_pagination = $this->hasPagination($entradas);

        return view('entradas.index', [
            'collection' => $entradas,
            'counter' => $has_pagination ? $entradas->total() : $entradas->count(),
            'entradas' => $has_pagination ? $entradas->getCollection() : $entradas,
            'has_pagination' => $has_pagination,
        ]);
    }

    public function create(CreateRequest $request)
    {   
        if( $consolidado = Consolidado::find($request->consolidado) )
            return view('entradas.create.consolidado', [
                'consolidado' => $consolidado,
                'entrada' => new Entrada,
            ]);

        return view('entradas.create.sin-consolidado', [
            'clientes' => \App\Cliente::all(),
            'entrada' => new Entrada,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $prepared = Entrada::prepare( $request->validated() );

        if(! $entrada = Entrada::create($prepared) )
            return back()->with('failure', 'Error al guardar entrada');

        return StoredRedirect::hasConsolidado($entrada->consolidado_id)
                             ->redirect($request->siguiente)
                             ->with('success', "{$entrada->numero} guardada");
    }

    public function show(Entrada $entrada, Request $request)
    {
        $shows = ['informacion','etapas','actualizaciones'];

        return view('entradas.show', [
            'entrada' => $entrada,
            'show' => $request->filled('show') && in_array($request->show, $shows) ? $request->show : $shows[0],
        ]);
    }

    public function edit(Entrada $entrada, EditRequest $request)
    {
        $editor = EditorsContainer::get($request->editor, $entrada);
        return view($editor->template, $editor->data);
    }

    public function update(Entrada $entrada, UpdateRequest $request)
    {
        $updater = UpdatersContainer::find($request->actualizar, $request->validated());
        
        if(! $entrada->fill( $updater->prepared() )->save() )
            return back()->with('failure', $updater->message('failure'));

        return redirect( $updater->route($entrada) )->with('success', $updater->message('success'));
    }

    public function destroy(Entrada $entrada)
    {
        if(! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        $route = Consolidado::where('id', $entrada->consolidado_id)->exists()
                ? route('consolidados.show', $entrada->consolidado_id)
                : route('entradas.index');

        return redirect($route)->with('success', "{$entrada->numero} eliminada");
    }

    public function destroyMany()
    {
        // code...
    }

    public function toPrint(Entrada $entrada, GuiaImpresion $guia)
    {
        $guia->incrementarIntentos()->save();

        return view('entradas.print.single', [
            'entrada' => $entrada,
            'guia' => $guia,
        ]);
    }

    public function toPrintMany(PrintManyRequest $request)
    {
        $guia = GuiaImpresion::find($request->guia);        
        $guia->incrementarIntentos()->save();

        return view('entradas.print.multiple', [
            'entradas' => Entrada::withRelations()->whereIn('id', $request->entradas)->get(),
            'guia' => $guia,
        ]);
    }
}
