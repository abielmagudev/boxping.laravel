<?php

// Example route: route('entradas.index', ['model' => $model->id, 'filter' => csrf_token()])

$settings = (object) [
    'has_route' => isset($route) && filter_var($route, FILTER_VALIDATE_URL),
    'route' => $route ?? false,
    'total' => isset($total) && is_int($total) ? $total : 0, 
];

?>
<div>
    <small class="text-muted">Total</small>
    @component('@.bootstrap.grid-left-right')
        @slot('left')
        <span>Entradas</span>
        @endslot
        @slot('right')
    
        @if( $settings->has_route )
        <a href="{{ $settings->route }}" class="btn btn-sm btn-primary py-0">{{ $settings->total }}</a>
            
        @else
        <span class="btn btn-sm btn-primary py-0">{{ $settings->total }}</span>
    
        @endif
        @endslot
    @endcomponent
</div>
