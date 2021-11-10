@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Salidas',
    'counter' => $salidas->count()
])
    @component('@.bootstrap.table', [
        'thead' => ['Entrada','Transportadora','Rastreo','Cobertua','Status']    
    ])
        @foreach($salidas as $salida)
        <tr>
            <td class="text-nowrap">{{ $salida->entrada->numero }}</td>
            <td class="text-nowrap">
                @if( $salida->hasTransportadora() )
                <?php $has_web = $salida->hasTransportadoraAttribute('web') ?>
                <a href="{{ $has_web ? $salida->transportadora->web : '#' }}" target="_blank" class="btn link-primary {{ $has_web ?: 'disabled' }}">{{ $salida->transportadora->nombre }}</a>
                @endif
            </td>
            <td class="text-nowrap">{{ $salida->rastreo ?? '' }}</td>

            <!-- COBERTURA -->
            <td class="text-nowrap">
                <?php 

                if( $salida->hasCobertura('domicilio') && $salida->hasDestinatario() )
                    $popover_content = $salida->entrada->destinatario->domicilio_sticker;
                elseif( $salida->hasCobertura('ocurre') ) 
                    $popover_content = $salida->domicilio_sticker;
                else 
                    $popover_content = false;

                ?>

                @if( $popover_content <> false )
                <a
                    href="#!"
                    tabindex="0" 
                    class="btn link-primary" 
                    data-bs-toggle="popover" 
                    data-bs-trigger="focus" 
                    data-bs-html="true" 
                    data-bs-placement="top"
                    data-bs-content="<?= $popover_content ?>"
                >
                    {{ ucfirst($salida->cobertura) }}
                </a>
                @endif
            </td>

            <!-- INCIDENTES -->
            <td class="">
                <div class="d-flex align-items-center">
                    <span class="badge flex-grow-1" style="background-color:<?= $salida->status_color ?>">{{ ucfirst($salida->status) }}</span>
                    @if( $salida->hasIncidentes() )
                        <a  
                            href="#!"
                            class="badge bg-danger text-white ms-1" 
                            tabindex="0" 
                            title="Incidentes" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="focus" 
                            data-bs-html="true" 
                            data-bs-placement="top"
                            data-bs-content="<?= $salida->getIncidentesImploded() ?>">
                            <small>{{ $salida->incidentes->count() }}</small>
                        </a> 
                    @endif     
                </div>
            </td>
            
            <td class="text-end">
                <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
