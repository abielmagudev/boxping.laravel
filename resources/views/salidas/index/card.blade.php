<?php

$component = new class($salidas, $settings)
{
    private $salidas;

    private $except = [];

    private $thead = [
        'entrada',
        'transportadora',
        'rastreo',
        'cobertua',
        'status',
    ];

    public function __construct($salidas, array $settings)
    {
        $this->salidas = $salidas;

        $this->except = isset($settings['except']) && is_array($settings['except']) ? $settings['except'] : [];
    }

    public function salidas()
    {
        return $this->salidas->sortByDesc('id');
    }

    public function except(string $item)
    {
        return in_array($item, $this->except);
    }

    public function thead()
    {
        $self = $this;

        $filtered = array_filter($self->thead, function ($item) use ($self) {
            return ! $self->except($item);
        });

        return array_map('ucfirst', $filtered);
    }
};

?>
@component('@.bootstrap.card', [
    'title' => 'Salidas',
    'counter' => $component->salidas()->count()
])
    @component('@.bootstrap.table', [
        'thead' => $component->thead()  
    ])
        @foreach($component->salidas() as $salida)
        <tr>
            <td class="text-nowrap">{{ $salida->entrada->numero }}</td>
            @if(! $component->except('transportadora'))
            <td class="text-nowrap">{{ ! $salida->hasTransportadora() ?: $salida->transportadora->nombre }}</td>
            @endif
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
            @if(! $component->except('transportadora'))            
                @if( $salida->hasTransportadora() && $salida->transportadora->hasWeb() )
                <a href="<?= $salida->transportadora->web ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('globe')->svg() !!}
                </a>
                @endif
            @endif

            @if(! $component->except('edit') ) 
                <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            @endif
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>
