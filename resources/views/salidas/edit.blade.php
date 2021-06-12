@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar salida',
    'pretitle' => "Entrada {$salida->entrada->numero}",
    'goback' => route('entradas.show', $salida->entrada_id)
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
        @method('put')
        @include('salidas._save')
        <div class="text-right">
            <button class="btn btn-warning" type="submit">Actualizar salida</button>
            <a href="{{ route('entradas.show', $salida->entrada) }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.modifiers')
        @slot('model', $salida)
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('salidas.destroy', $salida),
    'text' => 'Eliminar salida',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar salida de la entrada <br><b>{{ $salida->entrada->numero }}</b>?</p>
    <div class="border rounded mx-4 py-1">
        <table class="table table-sm table-borderless small m-0">
            <tbody>
                <tr>
                    <td class="text-muted text-end">Transportadora</td>
                    <td class="text-start">{{ $salida->transportadora->nombre }}</td>
                </tr>
                <tr>
                    <td class="text-muted text-end">Confirmación</td>
                    <td class="text-start">{{ $salida->confirmacion }}</td>
                </tr>
                <tr>
                    <td class="text-muted text-end">Rastreo</td>
                    <td class="text-start">{{ $salida->rastreo }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endslot
@endcomponent
<br>

@endsection
