<?php 

$settings = (object) [
    'pretitle' => isset($pretitle) && is_string($pretitle) ? $pretitle : null,
    'title' => isset($title) && is_string($title) ? $title : null,
    'subtitle' => isset($subtitle) && is_string($subtitle) ? $subtitle : null,
    'counter' => isset($counter) && is_numeric($counter) ? $counter : null,
    'has_options' => isset($options),
];

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="text-start">
        <small class="text-secondary">{{ $settings->pretitle }}</small>
        <h5 class="m-0">
            <span>{{ $settings->title }}</span>
            @if(! is_null($settings->counter) )
            <span class="badge bg-dark rounded-pill">{{ $settings->counter }}</span>
            @endif
        </h5>
        <small class="text-muted">{{ $settings->subtitle }}</small>
    </div>

    @if( $settings->has_options )       
    <div class="text-end">
        {!! $options !!}
    </div>
    @endif

</div>
