<?php

use \Illuminate\Support\Facades\Route;
// Route::has($prev)

$sizes = array(
    'sm' => 'pagination-sm',
    'lg' => 'pagination-lg',
);

$aligns = array(
    'center' => 'justify-content-center',
    'right'  => 'justify-content-end',
);

$settings = (object) array(
    'size'  => isset($size) && array_key_exists($size, $sizes) ? $sizes[$size] : '',
    'align' => isset($align) && array_key_exists($align, $aligns) ? $aligns[$align] : '',
    'has_prev' => isset($prev) && is_string($prev),
    'has_next' => isset($next) && is_string($next),
    'route_prev' => $prev ?? false,
    'route_next' => $next ?? false,
    'text_prev' => isset($next_text) && is_string($next_text) ? $next_text : 'Siguiente',
    'text_next' => isset($prev_text) && is_string($prev_text) ? $prev_text : 'Anterior',
);

?>
<div id="wrapper-pagination-simple">
    <ul class="pagination {{ $settings->size }} {{ $settings->align }}">
        <li class="page-item">
            @if( $settings->has_prev )
            <a href="{{ $settings->route_prev }}" class="page-link">{{ $settings->text_prev }}</a>

            @else
            <span class="page-link text-muted">{{ $settings->text_prev }}</span>

            @endif
        </li>
        <li class="page-item">
            @if( $settings->has_next )
            <a href="{{ $settings->route_next }}" class="page-link">{{ $settings->text_next }}</a>

            @else
            <span class="page-link text-muted">{{ $settings->text_next }}</span>

            @endif
        </li>
    </ul>
</div>
