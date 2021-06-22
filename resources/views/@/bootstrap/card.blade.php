<?php 

$settings = (object) [
    'body_padding' => isset($body_padding) && $body_padding === false ? 'p-0' : '',
    'body' => $body ?? '',
    'footer' => $footer ?? '',
    'has_body' => isset($body),
    'has_footer' => isset($footer),
    'has_header' => isset($header),
    'header_color' => isset($header_color) && is_string($header_color) ? $header_color : '',
    'header' => $header ?? '',
];

?>

<div class="card">
    @if( $settings->has_header )
    <div class="card-header {{ $settings->header_color }}">
        {!! $settings->header !!}
    </div>
    @endif

    @if( $settings->has_body )    
    <div class="card-body {{ $settings->body_padding }}">
        {!! $settings->body !!}
    </div>
    @endif

    @if( $settings->has_footer )
    <div class="card-footer">
        {!! $settings->footer !!}
    </div>
    @endif
</div>
