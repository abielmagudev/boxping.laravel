<?php 

$settings = (object) [
    'has_counter' => isset($counter) && is_numeric($counter),
    'has_goback' => isset($goback) && is_string($goback),
    'has_options' => isset($options),
    'has_pretitle' => isset($pretitle) && is_string($pretitle),
    'has_subtitle' => isset($subtitle) && is_string($subtitle),
    'has_title' => isset($title) && is_string($title),
    'counter' => $counter ?? null,
    'goback' => $goback ?? false,
    'options' => $options ?? null,
    'pretitle' => $pretitle ?? null,
    'subtitle' => $subtitle ?? null,
    'title' => $title ?? null,
];

?>

<div class="d-flex align-items-center justify-content-between">
    <div class="text-start">
        @if( $settings->has_pretitle )
        <p class="text-muted small m-0">{{ $settings->pretitle }}</p>
        @endif

        @if( $settings->has_title )    
        <h4 class="m-0">
            <span>{{ $settings->title }}</span>

            @if( $settings->has_counter )
            <span class="badge bg-dark rounded-pill">{{ $settings->counter }}</span>
            @endif
        </h4>
        @endif

        @if( $settings->has_subtitle )
        <p class="text-secondary m-0">{{ $settings->subtitle }}</p>
        @endif
    </div>

    <div class="text-end">
    @if( $settings->has_options )       
        {!! $settings->options !!}
    @endif

    @if( $settings->has_goback )
        <a href="{{ $settings->goback }}" class="btn btn-sm btn-secondary">
            <span class="d-block d-md-none fw-bold">&laquo;</span>
            <span class="d-none d-md-block">Regresar</span>
        </a>
    @endif
    </div>
</div>
<br>