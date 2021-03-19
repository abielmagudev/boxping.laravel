@extends('app')
@section('content')

@component('partials.subnav-salidas')
    @slot('active','salidas')
@endcomponent

@component('components.card', [
    'header_title' => 'Salidas',
    'header_title_badge' => $salidas->count(),
])
    @slot('body')
    @component('components.table', [
        'thead' => ['Entrada','Transportadora','Rastreo','Cobertua','Status'],
    ])
        @slot('tbody')
        @foreach($salidas as $salida)
        <tr>
            <td class="text-nowrap">{{ $salida->entrada->numero }}</td>
            <td class="text-nowrap">
                @if( $salida->transportadora )
                @if( $salida->transportadora->web )
                <a href="{{ $salida->transportadora->web }}" target="_blank" class="me-1">{!! $icons->globe !!}</a>
                
                @else
                <span class="text-muted">{!! $icons-globe !!}</span>

                @endif
                <span>{{ $salida->transportadora->nombre }}</span>
                @endif
            </td>
            <td class="text-nowrap">{{ $salida->rastreo ?? '...' }}</td>
            <td class="text-nowrap">
                <?php 
                
                if( $salida->cobertura == 'domicilio' && is_object($salida->entrada->destinatario) )
                {
                    $cobertura_content = "{$salida->entrada->destinatario->direccion}<br>C.P. {$salida->entrada->destinatario->codigo_postal}<br>{$salida->entrada->destinatario->ciudad}, {$salida->entrada->destinatario->estado}, {$salida->entrada->destinatario->pais}";
                }
                elseif( $salida->cobertura == 'ocurre' )
                {
                    $cobertura_content = "{$salida->direccion}<br>C.P. {$salida->postal}<br>{$salida->ciudad}, {$salida->estado}, {$salida->pais}";
                }
                else
                {
                    $cobertura_content = 'Sin dirección';
                }

                ?>
                <button
                    tabindex="0" 
                    class="text-primary bg-transparent border-0" 
                    type="button"
                    title="" 
                    data-bs-toggle="popover" 
                    data-bs-trigger="focus" 
                    data-bs-html="true" 
                    data-bs-placement="top"
                    data-bs-content="<?= $cobertura_content ?>">
                    {!! $icons->info_circle_fill !!}
                </button>
                {{ ucfirst($salida->cobertura) }}
            </td>
            <td class="">
                <div class="d-flex align-items-center">
                    <span class="badge bg-{{ $config_status[$salida->status]['color'] }}" style="flex:1">{{ ucfirst($salida->status) }}</span>
                    <?php
                    $incidentes_content = $salida->incidentes->count() > 0
                                        ? $salida->incidentesHtml
                                        : false;
                    ?>
                    @if( is_string($incidentes_content) )
                        <button  
                            class="btn btn-sm btn-danger rounded-pill py-0 px-2 ms-1" 
                            tabindex="0" 
                            title="Incidentes" 
                            type="button"
                            data-bs-toggle="popover" 
                            data-bs-trigger="focus" 
                            data-bs-html="true" 
                            data-bs-placement="top"
                            data-bs-content="<?= $incidentes_content ?>">
                            <small>{{ $salida->incidentes->count() }}</small>
                        </button> 
                    @endif     
                </div>
            </td>
            <td class="text-nowrap text-end">
                <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-warning btn-sm">
                    {!! $icons->pencil !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
