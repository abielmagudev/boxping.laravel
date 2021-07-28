@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Salidas',
    'counter' => $salidas->count()
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
        @component('@.bootstrap.table')
            @slot('thead', ['Entrada','Transportadora','Rastreo','Cobertua','Status'])
            @slot('tbody')
            @foreach($salidas as $salida)
            <tr>
                <td class="text-nowrap">{{ $salida->entrada->numero }}</td>
                <td class="text-nowrap">
                @if( $salida->transportadora )
                    @if( $salida->transportadora->web )
                    <a href="{{ $salida->transportadora->web }}" target="_blank" class="link-primary">{{ $salida->transportadora->nombre }}</a>
                    
                    @else
                    <span class="">{{ $salida->transportadora->nombre }}</span>

                    @endif
                @endif
                </td>
                <td class="text-nowrap">{{ $salida->rastreo ?? '' }}</td>
                <td class="text-nowrap">
                    <?php 
                    
                    if( $salida->cobertura == 'domicilio' && is_object($salida->entrada->destinatario) )
                    {
                        $cobertura_content = "{$salida->entrada->destinatario->direccion}<br>C.P. {$salida->entrada->destinatario->postal}<br>{$salida->entrada->destinatario->ciudad}, {$salida->entrada->destinatario->estado}, {$salida->entrada->destinatario->pais}";
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
                    <a
                        href="#!"
                        tabindex="0" 
                        class="link-primary" 
                        data-bs-toggle="popover" 
                        data-bs-trigger="focus" 
                        data-bs-html="true" 
                        data-bs-placement="top"
                        data-bs-content="<?= $cobertura_content ?>">
                        {{ ucfirst($salida->cobertura) }}
                    </a>
                </td>
                <td class="">
                    <div class="d-flex align-items-center">
                        <span class="badge flex-grow-1 bg-{{ $config_status[$salida->status]['color'] }}">{{ ucfirst($salida->status) }}</span>
                        <?php
                        $incidentes_content = $salida->incidentes->count() > 0
                                            ? $salida->incidentesHtml
                                            : false;
                        ?>
                        @if( is_string($incidentes_content) )
                            <a  
                                href="#!"
                                class="badge bg-danger text-white ms-1" 
                                tabindex="0" 
                                title="Incidentes" 
                                data-bs-toggle="popover" 
                                data-bs-trigger="focus" 
                                data-bs-html="true" 
                                data-bs-placement="top"
                                data-bs-content="<?= $incidentes_content ?>">
                                <small>{{ $salida->incidentes->count() }}</small>
                            </a> 
                        @endif     
                    </div>
                </td>
                <td class="text-end">
                    <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-sm btn-outline-warning">
                        {!! $svg->pencil !!}
                    </a>
                </td>
            </tr>
            @endforeach
            @endslot
        @endcomponent
    @endslot
@endcomponent
<br>

@endsection
