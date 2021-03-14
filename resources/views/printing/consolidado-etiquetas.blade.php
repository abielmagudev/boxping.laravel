@extends('printing')
@section('content')
@if( $entradas->count() )

@foreach($entradas as $entrada)

    <?php $etapa_orden_max = $entrada->etapas->max('orden') ?>
    @component('partials.printing-entrada-etiqueta', [
        'entrada' => $entrada,
        'salida' => $entrada->salida ?? new App\Salida,
        'etapa' => $entrada->etapas->firstWhere('orden', $etapa_orden_max),
    ])
    @endcomponent

@endforeach

@endif
@endsection
