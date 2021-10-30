<?php 

$settings = (object) [
    'body_classes' => isset($body_classes) && is_string($body_classes) ? $body_classes : '',
    'body_padding' => isset($body_padding) && $body_padding === false ? 'p-0' : '',
    'body' => $body ?? '',
    'classes' => isset($classes) && is_string($classes) ? $classes : '',
    'footer_classes' => isset($footer_classes) && is_string($footer_classes) ? $footer_classes : '',
    'footer' => $footer ?? '',
    'has_body' => isset($body),
    'has_footer' => isset($footer),
    'has_header' => isset($header),
    'header_classes' => isset($header_classes) && is_string($header_classes) ? $header_classes : '',
    'header' => $header ?? '',
];

?>

<div class="card border-0 shadow {{ $settings->classes }}">
    @if( $settings->has_header )
    <div class="card-header {{ $settings->header_classes }}">
        {!! $settings->header !!}
    </div>
    @endif

    @if( $settings->has_body )    
    <div class="card-body {{ $settings->body_padding }} {{ $settings->body_classes }}">
        {!! $settings->body !!}
    </div>
    @endif

    @if( $settings->has_footer )
    <div class="card-footer {{ $settings->footer_classes }}">
        {!! $settings->footer !!}
    </div>
    @endif
</div>
