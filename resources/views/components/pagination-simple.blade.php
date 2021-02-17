<?php

$sizes = array(
    'sm' => 'pagination-sm',
    'lg' => 'pagination-lg',
);

$aligns = array(
    'center' => 'justify-content-center',
    'right'  => 'justify-content-end',
);

$pagination = (object) array(
    'size'  => isset($size) && array_key_exists($size, $sizes) ? $sizes[$size] : '',
    'align' => isset($align) && array_key_exists($align, $aligns) ? $aligns[$align] : '',
);

?>
<div id="component-pagination-simple">
    <ul class="pagination {{ $pagination->size }} {{ $pagination->align }}">
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
