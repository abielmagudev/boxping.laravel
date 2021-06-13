<?php 

$settings = (object) [
    'body' => $body ?? null,
    'footer' => $footer ?? null,
    'header_left' => $header_left ?? null,
    'header_right' => $header_right ?? null,
    'has_body' => isset($body),
    'has_footer' => isset($footer),
    'has_headers' => isset($header_left) || isset($header_right),
];

?>

<div class="card">
    @if( $settings->has_headers )
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between"> 
            <div class="card-header-left">
                {!! $settings->header_left !!}
            </div>
            <div class="card-header-right">
                {!! $settings->header_right !!}
            </div>
        </div>
    </div>
    @endif

    <div class="card-body">
        {!! $settings->body !!}
    </div>

    @if( $settings->has_footer )
    <div class="card-footer">
        {!! $settings->footer !!}
    </div>
    @endif
</div>
