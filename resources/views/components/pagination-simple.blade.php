<?php

$pagination_simple_sizes = array(
    'sm' => 'pagination-sm',
    'lg' => 'pagination-lg',
);

$pagination_simple_aligns = array(
    'center' => 'justify-content-center',
    'right'  => 'justify-content-end',
);

$pagination_simple_settings = (object) array(
    'size'  => isset($size) && array_key_exists($size, $pagination_simple_sizes) ? $pagination_simple_sizes[$size] : '',
    'align' => isset($align) && array_key_exists($align, $pagination_simple_aligns) ? $pagination_simple_aligns[$align] : '',
);

?>
<div id="component-pagination-simple">
    <ul class="pagination {{ $pagination_simple_settings->size }} {{ $pagination_simple_settings->align }}">
        <li class="page-item">
            @if( $collection->previousPageUrl() )
            <a href="{{ $collection->previousPageUrl() }}" class="page-link">Anterior</a>

            @else
            <span class="page-link text-muted">Anterior</span>

            @endif
        </li>
        <li class="page-item">
            @if( $collection->nextPageUrl() )
            <a href="{{  $collection->nextPageUrl() }}" class="page-link">Siguiente</a>

            @else
            <span class="page-link text-muted">Siguiente</span>

            @endif
        </li>
    </ul>
</div>
