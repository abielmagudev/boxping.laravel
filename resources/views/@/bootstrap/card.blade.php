<?php 

$settings = (object) [
    'body' => $body ?? null,
    'footer' => $footer ?? null,
    'header' => $header ?? null,
    'has_body' => isset($body),
    'has_footer' => isset($footer),
    'has_header' => isset($header),
    'body_padding' => isset($body_padding) && $body_padding === false ? 'p-0' : '',
];

?>

<div class="card">
    @if( $settings->has_header )
    <div class="card-header">
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
