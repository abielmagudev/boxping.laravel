@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'goback' => route('entradas.show', $salida->entrada_id),
    'pretitle' => "Entrada {$salida->entrada->numero}",
    'title' => 'Editar salida',
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
        @include('@.partials.modifiers-block', [
            'model' => $salida,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
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
</div>
<br>

@endsection
