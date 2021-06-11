<?php

$settings = (object) [
    'thead' => $thead ?? false,
    'tbody' => $tbody ?? null,
    'has_thead' => isset($thead) && is_array($thead),
    'has_tbody' => isset($tbody),
];

?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        @if( $settings->has_thead )    
        <thead>
            <tr class="">
                @foreach ($settings->thead as $thead)
                <th class="border-0 py-3 small">{{ $thead }}</th>
                @endforeach
            </tr>
        </thead>
        @endif

        @if( $settings->has_tbody )          
        <tbody>
            {!! $tbody !!}
        </tbody>
        @endif
    </table>
</div>
