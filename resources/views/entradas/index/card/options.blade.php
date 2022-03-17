<div class="btn-group" role="group">
    {{-- Filtrar --}}
    @includeWhen($component->allow('filter'), 'entradas.index.card.modal-filter')

    {{-- Guias de impresión --}}
    @if( $component->allow('print') )
    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownImprimirMultiple">
        <button id="buttonDropdownImprimirMultiple" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('printer')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownImprimirMultiple">
            <li>
                <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple') ?>">Información</button>
            </li>
    
            @if( $guias_impresion->count() )
            <li>
                <hr class="dropdown-divider">
                <h6 class="dropdown-header">Guías de impresión</h6>
            </li>
    
            @foreach($guias_impresion as $guia)
            <li>
                <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple', $guia) ?>">{{ $guia->nombre }}</button>
            </li>
            @endforeach
    
            @endif
        </ul>
    </div>
    @endif

    {{-- Acciones --}}
    @if( $component->allow('actions') )        
    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownActions">
        <button id="buttonDropdownActions" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('list')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="buttonDropdownActions">
            @if( $component->allow('actions', 'create') )        
            <li>
                <a class="dropdown-item" href="<?= $component->hasCache('consolidado') ? route('entradas.create', ['consolidado' => $component->cache('consolidado')->id]) : route('entradas.create') ?>">
                    <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                    <span class="align-middle ms-1">Nueva</span>
                </a>
            </li>
            @endif
            @if( $component->allow('actions', 'import') )        
            <li>
                @include('entradas.index.card.modal-import')
            </li>
            @endif
            @if( $component->allow('actions', 'edit') )        
            <li>
                @include('entradas.index.card.modal-edit')
            </li>
            @endif
            @if( $component->allow('actions', 'delete') )        
            <li>
                @include('entradas.index.card.modal-delete')
            </li>
            @endif
        </ul>
    </div>
    @endif

</div>
