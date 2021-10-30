<?php 

$settings = (object) [
    'has_body' => $slot->isNotEmpty(),
    'has_footer' => isset($footer),
    'has_header' => isset($header),
    'body' => $slot ?? '',
    'header' => $header ?? '',
    'footer' => $footer ?? '',
];

?>

<div class="card border-0 shadow-sm">
    @if( $settings->has_header )
    <div class="card-header border-bottom bg-white py-3">
        {!! $settings->header !!}
    </div>
    @endif

    @if( $settings->has_body )    
    <div class="card-body">
        {!! $settings->body !!}
    </div>
    @endif

    @if( $settings->has_footer )
    <div class="card-footer">
        {!! $settings->footer !!}
    </div>
    @endif
</div>
