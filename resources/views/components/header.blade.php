<?php 

$header = (object) array(
    'has_heading' => isset($pretitle) || isset($title) || isset($subtitle),
    'has_options' => isset($options),
    'options'     => isset($options) ? $options : false,
    'pretitle'    => isset($pretitle) ? strval($pretitle) : false,
    'title'       => isset($title) ? strval($title) : false,
    'subtitle'    => isset($subtitle) ? strval($subtitle) : false,
    'goback'      => isset($goback) ? strval($goback) : false,
    'goback_text' => isset($goback_text) ? strval($goback_text) : 'Regresar',
);

?>

<div class="row align-items-center">
    @if( $header->has_heading )
    <div class="col-8">
        @if( $header->pretitle )
        <small class="d-block small text-muted">{{ $header->pretitle }}</small>
        @endif

        <div class="w-100 overflow-auto">
            <span>{!! $header->title !!}</span>
        </div>

        @if( $header->subtitle )
        <small class="d-block small text-muted">{{ $header->subtitle }}</small>
        @endif
    </div>
    @endif

    <div class="col-4 text-end">
        @if( $header->has_options ) 
        <div class="d-inline-block">{{ $header->options }}</div>
        @endif

        @if( $header->goback )
        <a href="{{ $header->goback }}" class="btn btn-sm btn-secondary">
            {!! $icons->arrow_left_circle !!}
            <span class="d-none d-md-inline-block ms-1">{{ $header->goback_text }}</span>
        </a>
        @endif
    </div>
</div>
<br>
