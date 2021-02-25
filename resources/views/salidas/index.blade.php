@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Salidas',
    'header_title_badge' => $salidas->count(),
])
    @slot('body')
    @component('components.table', [
        'thead' => ['Entrada','Transportadora','Rastreo','Confirmación','Cobertua','Status','',''],
    ])
        @slot('tbody')
        @foreach($salidas as $salida)
        <tr>
            <td class="">
                <a href="{{ route('entradas.show', $salida->entrada) }}" class="text-nowrap">{{ $salida->entrada->numero }}</a>
            </td>
            <td class="text-nowrap">
                @if( $salida->transportadora->web  )
                <a href="{{ $salida->transportadora->web }}" target="_blank" class="me-1">{!! $icons->globe !!}</a>
                @endif
                <span>{{ $salida->transportadora->nombre }}</span>
            </td>
            <td class="">{{ $salida->rastreo ?? '...' }}</td>
            <td class="">{{ $salida->confirmacion ?? '...' }}</td>
            <td class="">
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
                    class="w-100 text-primary bg-transparent border-0" 
                    type="button"
                    title="" 
                    data-bs-toggle="popover" 
                    data-bs-trigger="focus" 
                    data-bs-html="true" 
                    data-bs-placement="top"
                    data-bs-content="<?= $cobertura_content ?>">
                    {{ ucfirst($salida->cobertura) }}
                </button> 
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
                            class="btn btn-sm btn-danger text-white text-decoration-none small py-0 px-2 ms-1" 
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
            <td class="text-end">
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
