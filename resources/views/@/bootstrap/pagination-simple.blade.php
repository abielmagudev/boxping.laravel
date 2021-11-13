<?php

use \Illuminate\Support\Facades\Route;

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
    'prev' => (object) [
        'exists' => isset($prev) && is_string($prev),
        'route' => $prev ?? null,
        'text' => isset($prev_text) && is_string($prev_text) ? $prev_text : 'Anterior',
    ],
    'next' => (object) [
        'exists' => isset($next) && is_string($next),
        'route' => $next ?? null,
        'text' => isset($next_text) && is_string($next_text) ? $next_text : 'Siguiente',
    ],
);

?>

<div id="wrapper-pagination-simple">
    <ul class="pagination {{ $settings->size }} {{ $settings->align }}">
        <!-- Prev -->
        <li class="page-item <?= $settings->prev->exists ?: 'disabled' ?>">
            <a href="{{ $settings->prev->route }}" class="page-link">{{ $settings->prev->text }}</a>
        </li>
        
        <!-- Next -->
        <li class="page-item <?= $settings->next->exists ?: 'disabled' ?>">
            <a href="{{ $settings->next->route }}" class="page-link">{{ $settings->next->text }}</a>
        </li>
    </ul>
</div>
