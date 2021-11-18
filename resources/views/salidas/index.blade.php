@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Salidas',
    'counter' => $salidas->count()
])
    @component('@.bootstrap.table', [
        'thead' => ['Entrada','Transportadora','Rastreo','Cobertua','Status']    
    ])
        @foreach($salidas->sortByDesc('id') as $salida)
        <tr>
            <td class="text-nowrap">{{ $salida->entrada->numero }}</td>
            <td class="text-nowrap">{{ ! $salida->hasTransportadora() ?: $salida->transportadora->nombre }}</td>
            <td class="text-nowrap">{{ $salida->rastreo ?? '' }}</td>

            <!-- COBERTURA -->
            <td class="text-nowrap">
                @if( $salida->hasCobertura() )
                <button
                    class="btn btn-sm btn-outline-primary text-uppercase w-100" 
                    data-bs-content="<?= $salida->hasCobertura('ocurre') ? $salida->domicilio_ocurre : $salida->domicilio_destinatario ?>"
                    data-bs-html="true" 
                    data-bs-placement="top"
                    data-bs-toggle="popover" 
                    data-bs-trigger="focus"
                    title="<?= $salida->hasCobertura('ocurre') ? 'Sucursal' : 'Destinatario' ?>"
                >
                    <span>{{ $salida->cobertura }}</span>
                </button>
                @endif
            </td>

            <!-- INCIDENTES -->
            <td class="">
                @if( $salida->hasIncidentes() )
                <button 
                    class="btn btn-sm btn-outline-danger text-uppercase w-100"
                    data-bs-content="<ol><?= $salida->getListaIncidentes('li', true) ?></ol>"
                    data-bs-html="true" 
                    data-bs-placement="top"
                    data-bs-toggle="popover" 
                    data-bs-trigger="focus" 
                    title="<span class='badge bg-danger me-1'><?= $salida->incidentes->count() ?></span>
                            <small class='align-middle'>INCIDENTES</small>" 
                >
                    <span>{{ $salida->status }}</span>
                </button>

                @else
                <small class="d-block text-center text-uppercase <?= ! $salida->isOver() ?: 'text-success fw-bold' ?>">{{ $salida->status }}</small>
                
                @endif
            </td>
            
            <td class="text-end text-nowrap">                
                @if( $salida->hasTransportadora() && $salida->transportadora->hasWeb() )
                <a href="<?= $salida->transportadora->web ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('globe')->draw('svg') !!}
                </a>
                @endif

                <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->draw('svg') !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@include('@.bootstrap.pagination-simple', [
    'prev' => $salidas->previousPageUrl(),    
    'next' => $salidas->nextPageUrl(),    
])

@endsection
