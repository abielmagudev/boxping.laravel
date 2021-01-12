@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Salidas</span>
        <span class="badge badge-primary">{{ $salidas->count() }}</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Entrada</th>
                        <th>Transportadora</th>
                        <th>Rastreo</th>
                        <th>Confirmación</th>
                        <th>Cobertura</th>
                        <th>Status</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salidas as $salida)
                    <tr>
                        <td class="align-middle">
                            <a href="#">{{ $salida->entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            <span>{{ $salida->transportadora->nombre }}</span>
                            @if( $salida->transportadora->web  )
                            (<a href="{{ $salida->transportadora->web }}" target="_blank">www</a>)
                            @endif
                        </td>
                        <td class="align-middle">{{ $salida->rastreo }}</td>
                        <td class="align-middle">{{ $salida->confirmacion }}</td>
                        <td class="align-middle">
                            <?php 
                            
                                if( $salida->cobertura == 'domicilio' && is_object($salida->entrada->destinatario) )
                                {
                                    $cobertura_content = "{$salida->entrada->destinatario->direccion}, {$salida->entrada->destinatario->codigo_postal}<br>{$salida->entrada->destinatario->ciudad}, {$salida->entrada->destinatario->estado}, {$salida->entrada->destinatario->pais}";
                                }
                                elseif( $salida->cobertura == 'ocurre' )
                                {
                                    $cobertura_content = "{$salida->direccion}, {$salida->postal}<br>{$salida->ciudad}, {$salida->estado}, {$salida->pais}";
                                }
                                else
                                {
                                    $cobertura_content = 'Sin dirección';
                                }

                            ?>
                            <button
                                tabindex="0" 
                                class="btn btn-sm text-primary bg-transparent border-0 btn-block p-0" 
                                role="button" 
                                type="button"
                                title="" 
                                data-toggle="popover" 
                                data-trigger="focus" 
                                data-html="true" 
                                data-placement="top"
                                data-content="<?= $cobertura_content ?>">
                                {{ ucfirst($salida->cobertura) }}
                            </button> 
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <span class="badge badge-{{ $config_status[$salida->status]['color'] }}" style="flex:1">{{ ucfirst($salida->status) }}</span>
                                <?php
                                $incidentes_content = $salida->incidentes->count() > 0
                                                    ? $salida->incidentesHtml
                                                    : false;
                                ?>
                                @if( is_string($incidentes_content) )
                                    <a  
                                        href="#"
                                        tabindex="0" 
                                        class="badge badge-danger ml-1" 
                                        role="button" 
                                        data-toggle="popover" 
                                        data-trigger="focus" 
                                        data-html="true" 
                                        data-placement="top"
                                        title="Incidentes" 
                                        data-content="<?= $incidentes_content ?>">
                                        <b>{{ $salida->incidentes->count() }}</b>
                                    </a> 
                                @endif     
                            </div>
                        </td>
                        <td class="align-middle text-right">
                            <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-warning btn-sm">
                                <b>e</b>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
